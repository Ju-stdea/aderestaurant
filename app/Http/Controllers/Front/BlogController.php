<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogs(){
        return view('front.blogs.index');
    }

    public function blogDetail(){
        return view('front.blog.index');
    }
}
