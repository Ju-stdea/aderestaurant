<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // public function userProfile(){
    //     return view('front.user-dashboard.index');
    // }

    public function about(){
        return view('front.about.index');
    }

    public function contact(){
        return view('front.contact.index');
    }
}
