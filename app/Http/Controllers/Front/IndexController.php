<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('front.index')->with(compact('categories'));
    }

}

