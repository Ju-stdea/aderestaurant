<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Product;
use App\Models\Store;
use Auth;
use Log;
use Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $sessionId = Session::getId();
        $customerId = auth()->check() ? auth()->user()->id : null;
        $customer = auth()->user();
        $deliveryAddress = $customer ? $customer->deliveryAddresses()->first() : null;

        // Fetch cart items based on user authentication
        $cartItems = Cart::when($customerId, function ($query) use ($customerId) {
            return $query->where('customer_id', $customerId);
        }, function ($query) use ($sessionId) {
            return $query->where('session_id', $sessionId);
        })
            ->with('product')
            ->get()
            ->unique('product_id'); // Ensure no duplicates by product_id

        if ($cartItems->isEmpty()) {
            return redirect()->route('products')->with('info', 'Your cart is empty.');
        }

        $countries = Country::all();
        $store = Store::first();
        $cart = [];
        $subTotal = 0;
        $totalWeight = 0;

        foreach ($cartItems as $item) {

            $product = $item->product;

            $discountedPrice = Product::getDiscountedPrice($product->id);

            $finalPrice = ($discountedPrice > 0) ? $discountedPrice : $product->product_price;


            $itemTotal = $item->quantity * $finalPrice;

            $subTotal += $itemTotal;

            $itemWeight = $item->quantity * $product->product_weight;
            $totalWeight += $itemWeight;

            $cart[$product->id] = [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'product_price' => $finalPrice,
                'quantity' => $item->quantity,
                'total' => $itemTotal,
                'image_url' => $product->image_url,
                'size' => $item->size,
                'weight' => $itemWeight,
            ];
        }


        return view('front.checkout.index', compact('countries', 'cart', 'subTotal', 'totalWeight', 'store', 'deliveryAddress'));
    }



    public function success()
    {
        $countries = Country::all();

        return view('front.checkout.success.index', compact('countries'));
    }
}