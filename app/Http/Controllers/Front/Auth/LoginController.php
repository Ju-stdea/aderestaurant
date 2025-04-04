<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Customer;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    protected function authenticated(Request $request, $customer)
    {
        // Retrieve the session ID
        $sessionId = $request->session()->getId();
        
        // Check if there's a cart in the session
        $guestCart = Session::get('cart');

        if ($guestCart) {
            // Then, iterate through the guest cart items
            foreach ($guestCart as $item) {
                // Associate cart item with logged-in customer
                Cart::updateOrCreate(
                    [
                        'product_id' => $item['id'],
                        'session_id' => $item['session_id'],
                        'customer_id' => $customer->id,
                    ],
                    [
                        'quantity' => $item['quantity'],
                        'size' => $item['size'],
                        'total' => $item['total'],
                    ]
                );
            // Delete existing cart records for the session
            Cart::where('session_id', $item['session_id'])
                ->whereNull('customer_id')
                ->delete();
            }

            // Clear the guest cart from the session
            Session::forget('cart');
            Session::flush();
        }
    }




}
