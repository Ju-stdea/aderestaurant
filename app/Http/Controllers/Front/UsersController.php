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
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
}
