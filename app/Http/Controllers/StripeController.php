<?php

namespace App\Http\Controllers;

use App\Mail\AdminOrderNotificationMail;
use App\Mail\OrderConfirmationMail;
use App\Mail\StorePickConfirmationMail;
use App\Models\Order;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Validator;

class StripeController extends Controller
{
    protected $shippingService;

    public function __construct(ShippingController $shippingService)
    {
        $this->shippingService = $shippingService;
    }

    public function createCheckoutSession(Request $request)
    {
        $error = Product::checkStockLimit();
        if ($error) {
            return response()->json(['error' => $error], 400);
        }

        $deliveryMethod = $request->input('delivery_method', 'ship');
        $isBilling = $request->input('isBilling', true);

        $rules = [
            'email' => 'required|email',
            'tel' => 'required|numeric',
        ];

        if ($deliveryMethod === 'ship') {
            $rules = array_merge($rules, [
                'shipping_code' => 'required|string',
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'phone' => 'required|numeric',
                'address' => 'required|string',
                'postal' => 'required|string',
                'cityName' => 'required|string',
                'stateCode' => 'required|string',
                'countryCode' => 'required|string',
            ]);
        }

        if (!$isBilling) {
            $rules = array_merge($rules, [
                'billingFirstname' => 'required|string',
                'billingLastname' => 'required|string',
                'billingPhone' => 'required|numeric',
                'billingAddress' => 'required|string',
                'billingPostal' => 'required|string',
                'billingCityName' => 'required|string',
                'billingStateCode' => 'required|string',
                'billingCountryCode' => 'required|string',
            ]);
        }

        if ($isBilling && $deliveryMethod === 'pickup') {
            $rules = array_merge($rules, [
                'billingFirstname' => 'required|string',
                'billingLastname' => 'required|string',
                'billingPhone' => 'required|numeric',
                'billingAddress' => 'required|string',
                'billingPostal' => 'required|string',
                'billingCityName' => 'required|string',
                'billingStateCode' => 'required|string',
                'billingCountryCode' => 'required|string',
            ]);
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $shippingInfo = null;
        if ($deliveryMethod !== 'pickup') {
            $shippingInfo = [
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'address' => $request->input('address'),
                'apartment' => $request->input('apartment'),
                'postal_code' => $request->input('postal'),
                'city' => $request->input('cityName'),
                'state' => $request->input('stateCode'),
                'country' => $request->input('countryCode', 'US'),
                'phone' => $request->input('phone'),
            ];
        }

        $billingInfo = $isBilling && $shippingInfo !== null ? $shippingInfo : [
            'firstname' => $request->input('billingFirstname'),
            'lastname' => $request->input('billingLastname'),
            'address' => $request->input('billingAddress'),
            'apartment' => $request->input('billingApartment'),
            'postal_code' => $request->input('billingPostal'),
            'city' => $request->input('billingCityName'),
            'state' => $request->input('billingStateCode'),
            'country' => $request->input('billingCountryCode', 'US'),
            'phone' => $request->input('billingPhone'),
        ];

        // $tipAmount = floatval(number_format($request->input('tip_amount', 0), 2, '.', ''));
        $serviceCode = $request->input('shipping_code', null);

        $user = auth()->user();
        $cart = [];
        $subTotal = 0;
        $totalWeight = 0.0;

        $cartItems = Cart::getCartItems($user);

        foreach ($cartItems as $item) {
            $product = $item->product;

            if (!$product) {
                continue;
            }

            $discountedPrice = Product::getDiscountedPrice($product->id);
            $finalPrice = ($discountedPrice > 0) ? $discountedPrice : $product->product_price;

            if ($finalPrice <= 0) {
                continue;
            }

            $itemTotal = $item->quantity * $finalPrice;
            $subTotal += $itemTotal;

            $itemWeight = $item->quantity * (float) $product->product_weight;
            $totalWeight += $itemWeight;

            $cart[] = [
                'product_id' => $product->id,
                'product_code' => $product->product_code,
                'name' => $product->product_name,
                'price' => $finalPrice,
                'quantity' => $item->quantity,
                'image_url' => $product->image_url,
            ];

        }

        $order = new Order();
        $customerId = auth()->id();
        $isGuest = is_null($customerId);

        if ($user) {
            $order->customer_id = $customerId;
            $user->mobile = $request->input('tel');
            $user->save();
        } else {
            $order->guest_email = $request->input('email');
            $order->guest_name = $billingInfo['firstname'] . ' ' . $billingInfo['lastname'];
            $order->guest_phone = $request->input('tel');
        }


        try {

            $order->shipping_address = json_encode($shippingInfo);
            $order->billing_address = json_encode($billingInfo);

            $sessionData = $this->createStripeCheckoutSession($cart, $serviceCode,$totalWeight, $deliveryMethod, $shippingInfo ?? null);

            $serviceMapping = $this->shippingService->getUPSServiceMapping();

            $order->transaction_id = $sessionData['id'];
            $order->payment_gateway = 'Stripe';
            $order->payment_method = 'Credit Card';
            // $order->tips = $tipAmount;
            $order->sub_total_amount = $subTotal;
            $order->ups_service_code = $serviceCode;
            $order->ups_service_name = $serviceMapping[$serviceCode]['description'] ?? null;
            $order->ups_shipping_charges = $sessionData['shippingRate'] ?? 0;
            $order->delivery_method = $deliveryMethod;
            $order->grand_total = $subTotal + ($sessionData['shippingRate']);
            $order->courier_name = $deliveryMethod === 'pickup' ? 'Pickup' : 'UPS';
            $order->order_amount = $subTotal;
            $order->total_weight = $totalWeight;
            $order->order_date = now();
            $order->save();

            foreach ($cart as $item) {
                $order->orders_products()->create([
                    'customer_id' => $customerId,
                    'guest_email' => $isGuest ? $request->input('email') : null,
                    'product_id' => $item["product_id"],
                    'product_price' => $item["price"],
                    'product_code' => $item["product_code"],
                    'product_qty' => $item["quantity"],
                    'product_total' => $item["quantity"] * $item["price"],
                ]);
            }

            if ($request->input('email_opt_in')) {
                $subscribe = Subscribe::where('email', $request->input('email'))->first();
                if ($subscribe) {
                    $subscribe->status = 'ACTIVE';
                    $subscribe->save();
                } else {
                    Subscribe::create([
                        'email' => $request->input('email'),
                        'status' => 'ACTIVE',
                    ]);
                }
            }

            if ($user) {
                $user->address = $billingInfo['address'];
                $user->zipcode = $billingInfo['postal_code'];
                $user->city = $billingInfo['city'];
                $user->state = $billingInfo['state'];
                $user->country = $billingInfo['country'];
                $user->save();
            }

            return response()->json(['url' => $sessionData['url']], 200);

        } catch (\Exception $e) {
            Log::error('Error creating checkout session: ' . $e->getMessage());

            return response()->json(['error' => 'Unable to process checkout. Please try again later.'], 500);
        }
    }



    private function createStripeCheckoutSession(array $cart, ?string $serviceCode, $totalWeight, string $deliveryMethod, ?array $shipToAddress): array
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $lineItems = $this->buildLineItems($cart);
        $shippingRate = 0;

        if ($deliveryMethod !== 'pickup') {
            try {
                $shippingRate = $this->shippingService->getShippingRateByCode($serviceCode, $totalWeight, $shipToAddress ?? []);
                $shippingRate = $shippingRate ?? 0;
                $lineItems[] = $this->buildShippingLineItem($shippingRate);
            } catch (\Exception $e) {
                Log::error('Shipping rate calculation error: ' . $e->getMessage());
            }
        }

        // if ($tipAmount > 0) {
        //     $lineItems[] = $this->buildTipLineItem($tipAmount);
        // }

        try {
            $checkoutSession = Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('stripe.cancel'),
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating Stripe Checkout Session: ' . $e->getMessage());
            throw $e;
        }

        $sessionData = [
            'url' => $checkoutSession->url,
            'id' => $checkoutSession->id,
            'shippingRate' => $shippingRate
        ];

        return $sessionData;
    }

    private function buildLineItems(array $cart)
    {
        $lineItems = [];

        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => env('CURRENCY', 'usd'),
                    'product_data' => [
                        'name' => $item['name'],
                        'images' => [$item['image_url']],
                    ],
                    'unit_amount' => $item['price'] * 100,
                ],
                'quantity' => $item['quantity'],
            ];
        }

        return $lineItems;
    }

    private function buildShippingLineItem(float $shippingRate)
    {
        return [
            'price_data' => [
                'currency' => env('CURRENCY', 'usd'),
                'product_data' => [
                    'name' => 'Shipping',
                ],
                'unit_amount' => $shippingRate * 100,
            ],
            'quantity' => 1,
        ];
    }

    private function buildTipLineItem(float $tipAmount)
    {
        return [
            'price_data' => [
                'currency' => env('CURRENCY', 'usd'),
                'product_data' => [
                    'name' => 'Tip',
                ],
                'unit_amount' => $tipAmount * 100,
            ],
            'quantity' => 1,
        ];
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $sessionId = $request->get('session_id');

        try {
            $order = Order::where('transaction_id', $sessionId)->where("order_status", "Pending")->first();

            if (!$order) {
                return redirect()->route('checkout.index');
            }

            $order->payment_status = 'Paid';
            $order->save();

            $sessionId = session()->getId() ?? null;
            $customerId = auth()->id() ?? null;

            if (!empty($order->shipping_address)) {
                $shippingInfo = json_decode($order->shipping_address, true);

                if ($shippingInfo) {
                    $shipTo = [
                        'name' => $shippingInfo['firstname'] . ' ' . $shippingInfo['lastname'],
                        'attention_name' => $shippingInfo['firstname'],
                        'phone' => $shippingInfo['phone'],
                        'address_line' => $shippingInfo['address'],
                        'city' => $shippingInfo['city'],
                        'state' => $shippingInfo['state'],
                        'postal_code' => $shippingInfo['postal_code'],
                        'country_code' => $shippingInfo['country'],
                    ];

                    $totalWeight = $order->total_weight;
                    $serviceCode = $order->ups_service_code;

                    $this->shippingService->createShipmentForOrder($order->id, $shipTo, $totalWeight, $serviceCode);
                }
            }

            $email = auth()->user() ? auth()->user()->email : $order->guest_email;

            if ($order->delivery_method === 'pickup') {
                Mail::to($email)->send(new StorePickConfirmationMail($order->id));
            } else {
                Mail::to($email)->send(new OrderConfirmationMail($order->id));
            }

            Mail::to(env("COMPANY_EMAIL"))->send(new AdminOrderNotificationMail($order));

            Cart::clearCart($sessionId, $customerId);

            return view('front.checkout.success.index');

        } catch (\Throwable $th) {
            Log::error('Error fetching Stripe session data: ' . $th->getMessage());
            return redirect()->route('checkout.index');
        }
    }


    public function cancel()
    {
        return redirect()->route('checkout.index');
    }
}
