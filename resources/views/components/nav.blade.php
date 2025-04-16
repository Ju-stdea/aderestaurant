<?php

use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Wishlist;
use App\Models\Product;

$categories = Category::get();

$user = auth()->user();
$cart = [];
$totalQuantity = 0;
$totalAmount = 0;

if ($user) {
    // User is logged in, get cart based on customer_id
    $cartItems = Cart::where('customer_id', $user->id)
        ->get()
        ->unique('product_id'); // Ensure unique products by product_id

    foreach ($cartItems as $item) {
        // Get the discounted price
        $discountedPrice = Product::getDiscountedPrice($item->product_id);

        // Determine the final price
        $finalPrice = $discountedPrice > 0 ? $discountedPrice : $item->product->product_price;

        // Add unique product to cart array
        $cart[$item->product_id] = [
            'id' => $item->product_id,
            'product_name' => $item->product->product_name,
            'product_price' => $finalPrice,
            'quantity' => $item->quantity,
            'image_url' => $item->product->image_url,
            'size' => $item->size,
        ];
    }
} else {
    // User is not logged in, get cart from session (Database using session id)
    $sessionId = Session::getId();
    $cartItems = Cart::where('session_id', $sessionId)
        ->get()
        ->unique('product_id'); // Ensure unique products by product_id

    foreach ($cartItems as $item) {
        // Get the discounted price
        $discountedPrice = Product::getDiscountedPrice($item->product_id);

        // Determine the final price
        $finalPrice = $discountedPrice > 0 ? $discountedPrice : $item->product->product_price;

        // Add unique product to cart array
        $cart[$item->product_id] = [
            'id' => $item->product_id,
            'product_name' => $item->product->product_name,
            'product_price' => $finalPrice,
            'quantity' => $item->quantity,
            'image_url' => $item->product->image_url,
            'size' => $item->size,
        ];
    }
}

// Calculate the total quantity and amount for unique products
$totalQuantity = array_sum(array_column($cart, 'quantity'));
$totalAmount = array_sum(array_column($cart, 'total'));

if (Auth::check()) {
    $wishLiistCount = Wishlist::where('customer_id', $user->id)->count();
} else {
    $wishLiistCount = '0';
}

?>
 <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Birnin kebbi, kebbi state</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">jhabisfoodmart@gmail.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="{{ url('/privacy-policy') }}" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="{{ url('/terms-of-service') }}" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="{{ url('/returns-and-refund') }}" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="{{ url('/') }}" class="navbar-brand"><h1 class="text-primary display-6">Jhabis Food Mart</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                            <a href="{{ url('/products') }}" class="nav-item nav-link {{ Request::is('products') ? 'active' : '' }}">Products</a>
                            <a href="{{ url('/about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
                            <a href="{{ url('/contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <a href="{{ url('/carts') }}" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">{{ $totalQuantity }}</span>
                            </a>
                           @auth
                            <a href="{{ url('dashboard') }}" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                           @else
                                <a href="{{ url('login') }}"><i class="fas fa-user-lock fa-2x"></i></a>
                           @endauth
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Look for something nutritious.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                     <form action="{{ route('search') }}" method="GET">
                    <div class="modal-body d-flex align-items-center">
                       
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" name="search" class="form-control p-3" placeholder="Type something healthy" aria-describedby="search-icon-1">
                            <button id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                        </div>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->
