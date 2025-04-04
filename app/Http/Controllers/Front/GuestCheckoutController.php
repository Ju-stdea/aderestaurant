<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestCheckoutController extends Controller
{
    public function view()
    {
        return view('front.guest-checkout.index');
    }

    public function  nonguest()
    {
        return view('front.guest-checkout.nonguestcheckout');
    }
}
