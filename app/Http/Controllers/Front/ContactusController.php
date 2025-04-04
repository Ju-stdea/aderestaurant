<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class ContactusController extends Controller
{
    public function contact(Request $request) {
        $validated =  $request->validate([
            'name' => ['required', 'string', 'max:125'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        Contact::create([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'subject'=> $validated['subject'],
            'message'=> $validated['message'],
        ]);

        $message = 'Thank you for reaching out to us! We have received your message and will get back to you as soon as possible. Your feedback is important to us.';
        session::flash('success_message', $message);
        return redirect()->back();
     }
}
