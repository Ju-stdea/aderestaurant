<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController as BaseController;

class AuthController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }

    public function login(Request $request) {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $credentials = $request->only("email", "password");
        if(Auth::attempt($credentials)){
            return redirect('admin/dashboard');
        }
    }
}
