<?php

namespace App\Http\Controllers;

use App\Mail\AdminOrderNotificationMail;
use App\Mail\OrderConfirmationMail;
use App\Mail\StorePickConfirmationMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Services\FedExService;
use DB;
use Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session as LaravelSession;
use Validator;


class PayPalController extends Controller
{
    protected $paypalClient;
    protected FedExService $fedExService;
    protected $shippingService;

    public function __construct(FedExService $fedExService, ShippingController $shippingService)
    {
        $this->fedExService = $fedExService;
        $this->paypalClient = new PayPalClient;
        $this->paypalClient->setApiCredentials(config('paypal'));
        $this->shippingService = $shippingService;
    }

    public function payPalCheckOut(Request $request)
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

        if ($deliveryMethod !== 'pickup') {
            $rules = array_merge($rules, [
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

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $shippingInfo = $deliveryMethod !== 'pickup' ? [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'address' => $request->input('address'),
            'apartment' => $request->input('apartment'),
            'postal_code' => $request->input('postal'),
            'city' => $request->input('cityName'),
            'state' => $request->input('stateCode'),
            'country' => $request->input('countryCode', 'US'),
            'phone' => $request->input('phone'),
        ] : null;

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

        // $tipAmount = number_format($request->input('tip_amount', 0), 2);
        $serviceCode = $request->input('shipping_code', null);

        $user = auth()->user();
        $cart = [];
        $subTotal = 0.0;
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


        if (!$user) {
            session([
                'guest_email' => $request->input('email'),
                'guest_name' => $billingInfo['firstname'] . ' ' . $billingInfo['lastname'],
                'guest_phone' => $request->input('tel'),
            ]);
        }


        try {
            $shippingRate = $deliveryMethod !== 'pickup'
                ? $this->shippingService->getShippingRateByCode($serviceCode, $totalWeight, $shippingInfo ?? [])
                : 0;

            $serviceMapping = $this->shippingService->getUPSServiceMapping();

            $total = $subTotal + $shippingRate;

            $order = new Order();

            $customerId = auth()->id();
            $isGuest = is_null($customerId);

            $order->customer_id = $customerId;
            $order->transaction_id = 'paypal_' . uniqid();
            $order->guest_email = $isGuest ? $request->input('email') : null;
            $order->guest_name = $isGuest ? ($billingInfo['firstname'] . ' ' . $billingInfo['lastname']) : null;
            $order->guest_phone = $isGuest ? $request->input('tel') : null;
            $order->ups_service_name = $serviceMapping[$serviceCode]['description'] ?? null;
            $order->shipping_address = json_encode($shippingInfo);
            $order->billing_address = json_encode($billingInfo);
            $order->delivery_method = $deliveryMethod;
            $order->payment_method = 'Credit Card';
            $order->payment_gateway = 'PayPal';
            $order->courier_name = 'UPS';
            $order->order_amount = $subTotal;
            $order->sub_total_amount = $subTotal;
            $order->grand_total = $total;
            // $order->tips = $tipAmount;
            $order->ups_shipping_charges = $shippingRate;
            $order->ups_service_code = $serviceCode;
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

            if ($user) {
                $user->address = $billingInfo['address'];
                $user->zipcode = $billingInfo['postal_code'];
                $user->city = $billingInfo['city'];
                $user->state = $billingInfo['state'];
                $user->country = $billingInfo['country'];
                $user->save();
            }

            session()->put('order_id', $order->id);

            $token = $this->paypalClient->getAccessToken();
            $this->paypalClient->setAccessToken($token);

            $order = $this->paypalClient->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('paypal.success'),
                    "cancel_url" => route('paypal.cancel'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $total,
                        ],
                    ],
                ],
            ]);

            $approvalLink = null;
            foreach ($order['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    $approvalLink = $link['href'];
                    break;
                }
            }

            if ($approvalLink) {
                return response()->json(['approval_url' => $approvalLink]);
            } else {
                return response()->json(['error' => 'PayPal approval link not found.'], 500);
            }
        } catch (\Exception $e) {
            Log::error('PayPal Checkout Error: ' . $e->getMessage(), ['exception' => $e]);

            return response()->json(['error' => 'An error occurred during PayPal checkout. Please try again.'], 500);
        }
    }

    public function payPalcheckOutSuccess(Request $request)
    {

        DB::beginTransaction();

        try {
            $token = $this->paypalClient->getAccessToken();
            $this->paypalClient->setAccessToken($token);

            $result = $this->paypalClient->capturePaymentOrder($request['token']);

            if ($result['status'] == 'COMPLETED') {

                $customerId = auth()->id();
                $sessionId = session()->getId();

                $orderId = session()->get('order_id');

                $order = Order::where('id', $orderId)
                    ->first();

                if (!$order) {
                    throw new \Exception('Order not found.');
                }

                $order->transaction_id = $result['id'];
                $order->payment_status = 'Paid';

                $order->save();

                $shippingInfo = json_decode($order->shipping_address, true);
                $totalWeight = $order->total_weight;
                $serviceCode = $order->ups_service_code;

                if ($shippingInfo !== null) {
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

                    $this->shippingService->createShipmentForOrder($order->id, $shipTo, $totalWeight, $serviceCode);
                }

                $email = auth()->user() ? auth()->user()->email : $order->guest_email;

                if ($order->delivery_method === 'pickup') {
                    Mail::to($email)->send(new StorePickConfirmationMail($order->id));
                } else {
                    Mail::to($email)->send(new OrderConfirmationMail($order->id));
                }

                Mail::to(env("COMPANY_EMAIL"))->send(new AdminOrderNotificationMail($order));

                Cart::clearCart($sessionId, $customerId);

                DB::commit();

                session()->forget(['order_id']);

                return redirect()->route('checkout.success')->with('success', 'Payment successful and order completed.');
            } else {
                session()->flash('error', 'Payment failed.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('checkout.index')->with('error', $e->getMessage());
        }
    }


    public function payPalcheckOutCancel(Request $request)
    {
        return redirect()->route('checkout.index')->with('error', 'Payment canceled');
    }

    public function calculateTotal()
    {
        $cartItems = Cart::where('customer_id', auth()->id())
            ->with(['product', 'customer'])
            ->get();

        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->quantity * $item->product->product_price;
        }

        return $total;
    }


}