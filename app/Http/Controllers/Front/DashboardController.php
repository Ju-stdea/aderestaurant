<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DeliveryAddress;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Order;
use App\Models\Review;
use App\Models\Wishlist;
use Log;
use Str;
use Validator;
use App\Models\OrdersProduct;



class DashboardController extends Controller
{

    // Check if user is authenticated or not
    public function userDashboard(): View|RedirectResponse
    {


        if (Auth::check()) {
            $user = Auth::user();
            $countries = Country::all();
            $deliveryAddresses = $user->deliveryAddresses;

            // Fetch orders that do not have a review yet
            $reviewsActiveOrders = OrdersProduct::where('customer_id', $user->id)
                ->where('is_review', 'FALSE')
                ->with('product')
                ->get();
            $reviewedproducts = Review::where('customer_id', $user->id)
                ->with('product')
                ->get();



            $wishlist = [];
            $wishlistCount = 0;
            $wishlistItems = Wishlist::where('customer_id', $user->id)->get();

            foreach ($wishlistItems as $item) {
                $wishlist[$item->product_id] = [
                    'id' => $item->product_id,
                    'product_name' => $item->product->product_name,
                    'product_price' => $item->product->product_price,
                    'image_url' => $item->product->image_url,
                ];
            }
            $wishlistCount = $wishlistItems->count();
            $orderCount = Order::where('customer_id', $user->id)->where('order_status', 'completed')->count();
            $pendingOrderCount = Order::where('customer_id', $user->id)->where('order_status', 'pending')->count();
            $reviewCount = Review::where('customer_id', $user->id)->count();

            $orders = Order::where('customer_id', $user->id)->with('orders_products.product')->get();

            return view('front.user-dashboard.index', compact('countries', 'deliveryAddresses', 'reviewsActiveOrders', 'reviewedproducts', 'wishlist', 'orderCount', 'pendingOrderCount', 'reviewCount', 'orders'));
        }

        return redirect('login')->with('error', 'Oops! Kindly Log In.');
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|max:5120', // max 5MB
        ]);

        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('images/profile_images', 'public');
            $user->profile_image = $path;
        }

        $user->save();

        return response()->json(['message' => 'Profile updated successfully.']);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect.'], 400);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Log out the user and invalidate their token
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Password updated successfully.']);
    }

    public function updateBillingAddress(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'zipcode' => 'required|numeric',
        ]);

        $user = Auth::user();

        $user->update([
            'address' => $request->input('address'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'zipcode' => $request->input('zipcode'),
        ]);

        if ($request->input("is_shipping") == 1) {
            $data = [
                'address_line' => $request->input('address'),
                'country' => $request->input('country'),
                'state' => $request->input('state'),
                'city' => $request->input('city'),
                'zipcode' => $request->input('zipcode'),
            ];

            DeliveryAddress::updateOrCreate(
                ['user_id' => $user->id],
                $data
            );
        }

        return redirect()->back()->with('success', 'Billing address updated successfully.');



    }

    public function updateShippingAddress(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'zipcode' => 'required|numeric',
        ]);

        $user = Auth::user();

        $data = [
            'address_line' => $request->input('address'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'zipcode' => $request->input('zipcode'),
        ];

        DeliveryAddress::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return redirect()->back()->with('success', 'Shipping address updated successfully.');
    }

    public function updateAddress(Request $request)
    {
        try {
            $request->merge(['is_shipping' => $request->has('is_shipping')]);

            $request->validate([
                'address' => 'required|string|max:255',
                'state_country_code' => 'required',
                'state_iso2' => 'required',
                'city_name' => 'required',
                'zipcode' => 'required|numeric',
                'addressType' => 'required|in:billing,shipping',
                'is_shipping' => 'nullable|boolean',
            ]);

            $user = Auth::user();

            if ($request->addressType === 'billing') {
                $user->address = $request->address;
                $user->country = $request->state_country_code;
                $user->state = $request->state_iso2;
                $user->city = $request->city_name;
                $user->zipcode = $request->zipcode;
                $user->save();
            }

            if ($request->addressType === 'shipping' || $request->is_shipping) {
                DeliveryAddress::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'address_line' => $request->address,
                        'country' => $request->state_country_code,
                        'state' => $request->state_iso2,
                        'city' => $request->city_name,
                        'zipcode' => $request->zipcode,
                    ]
                );
            }

            return response()->json(['success' => true, 'message' => 'Address updated successfully!']);

        } catch (\Exception $e) {
            Log::error('Error updating address: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'There was a problem updating the address. Please try again.'], 400);
        }
    }



    public function __construct()
    {
        $this->middleware('auth');
    }
}
