<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribe;

class OtherPagesController extends Controller
{
    public function faq(){
        return view('front.faq.index');
    }

    public function termsOfService(){
        return view('front.terms-of-service.index');
    }

    public function returnsAndRefunds(){
        return view('front.returns-and-refund.index');
    }
    
    public function privacyPolicy(){
        return view('front.privacy-policy.index');
    }
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
           'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Subscribe::class],
        ], [
            'email.unique' => 'This email already exists.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
        ]);

        Subscribe::create([
            'email' => $validated['email'],
        ]);

        return redirect()->back()->with('subscribe', 'Thank you for subscribing to our newsletter');
    }


}
