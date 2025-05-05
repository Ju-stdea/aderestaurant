<?php

/* 
 * Laravel Routes
 */

use App\Http\Controllers\Front\FrontOrdersController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/* 
 * Admin Routes
 */
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Middleware\Admin;

/** 
 * Front Routes
 */

use App\Http\Controllers\Front\Auth\ForgotPasswordController;
use App\Http\Controllers\Front\Auth\LoginController;
use App\Http\Controllers\Front\Auth\RegisterController;
use App\Http\Controllers\Front\Auth\ResetPasswordController;
use App\Http\Controllers\Front\Auth\VerificationController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\Front\UsersController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\Front\OtherPagesController;
use App\Http\Controllers\Front\LocationController;
use App\Http\Controllers\Front\PersonalInformation;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\ContactusController;
use App\Http\Controllers\Front\GuestCheckoutController;




// Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth:web']], function () {

    Route::get('dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard')->middleware('verified');
    Route::post('/profile/update', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::post('/password/update', [DashboardController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/shipping-address/update', [DashboardController::class, 'updateAddress'])->name('address.update');


    Route::get('/shipping/track/{trackingNumber}', [ShippingController::class, 'trackShipment']);
});

Route::post('/validate-address', [\App\Http\Controllers\ShippingController::class, 'validateAddress']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/calculate-shipping', [ShippingController::class, 'calculateShipping'])->name('calculate.shipping');
Route::post('/shipping/rate', [ShippingController::class, 'getRate'])->name('shipping.rates');
Route::post('paypal/checkout', [PayPalController::class, 'payPalcheckOut'])->name('checkout.process');
Route::get('paypal/success', [PayPalController::class, 'payPalcheckOutSuccess'])->name('paypal.success');
Route::get('paypal/cancel', [PayPalController::class, 'payPalcheckOutCancel'])->name('paypal.cancel');
Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

Route::get('guest-checkout', [GuestCheckoutController::class, 'view'])->name('guest-checkout');
Route::get('non-guest-checkout', [GuestCheckoutController::class, 'nonguest'])->name('non-guest-checkout');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/create-checkout-session', [StripeController::class, 'createCheckoutSession'])->name('checkout.session');
Route::get('/stripe/success', [StripeController::class, 'success'])->name('stripe.success');
Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

Route::controller(RegisterController::class)->group(function () {
    Route::get('register', 'showRegistrationForm')->name('register');
    Route::post('register', 'register');
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('password/reset', 'showLinkRequestForm')->name('password.update');
    Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('password/reset', 'reset');
});

// Location Routes
Route::get('get-states/{country}', [LocationController::class, 'getStates']);
Route::get('get-cities/{state}', [LocationController::class, 'getCities']);

Route::get('about', [UsersController::class, 'about'])->name('about');
Route::get('contact', [UsersController::class, 'contact'])->name('contact');
Route::get('blogs', [BlogController::class, 'blogs'])->name('blogs');
Route::get('blog/detail', [BlogController::class, 'blogDetail'])->name('blog.detail');
Route::get('faq', [OtherPagesController::class, 'faq']);
Route::get('terms-of-service', [OtherPagesController::class, 'termsOfService']);
Route::get('returns-and-refund', [OtherPagesController::class, 'returnsAndRefunds']);
Route::get('privacy-policy', [OtherPagesController::class, 'privacyPolicy']);
Route::get('subscribe', [OtherPagesController::class, 'subscribe'])->name('subscribe');

Route::get('contact-us', [ContactusController::class, 'contact'])->name('contact-us');

// Products Routes
Route::prefix('products')->controller(ProductsController::class)->group(function () {
    Route::get('/', 'products')->name('products');
    Route::get('seller-products', 'sellerProducts');
    Route::get('flash-sale', 'flashSale');
    Route::get('details/{id}', 'single');
    Route::get('compare', 'compareProduct');
    Route::get('category/{id}', 'categoryProducts');
    Route::get('search', 'products')->name('search');
    Route::get('add-to-cart', 'addToCart')->name('add-to-shopping-cart');
    Route::get('review-a-product', 'review')->name('review-product');
});

// User Profile Routes
Route::prefix('user')->controller(UsersController::class)->group(function () {
    Route::get('profile', 'userProfile');
});

// Cart Routes
Route::prefix('carts')->controller(CartController::class)->group(function () {
    Route::get('/', 'carts')->name('cart');
    Route::get('carts/clear-cart', 'clearCart')->name('clear-cart');
    Route::get('/cart/remove', 'remove_item')->name('cart.remove');
    Route::get('/cart/increase', 'update_increase_cart')->name('update.increase.cart');
    Route::get('/cart/decrease', 'update_decrease_cart')->name('update.decrease.cart');

});

// Checkout Routes
Route::prefix('checkout')->controller(CheckoutController::class)->group(function () {
    Route::get('/', 'index')->name('checkout.index');
});

// Wishlist Routes
Route::prefix('wishlist')->controller(WishlistController::class)->group(function () {
    Route::get('/', 'wishlistIndex');
    Route::get('addWishlist', 'addWishlist')->name('addWishlist');
    Route::get('removeWishlist', 'removeWishlist')->name('removeWishlist');
    Route::get('clearWishlist', 'clearWishlist')->name('clearWishlist');
});

// Orders Routes
Route::prefix('orders')->controller(FrontOrdersController::class)->group(function () {
    Route::get('/track-order', 'trackOrder');
    Route::get('/view/{uuid}', 'orderDetails')->name('order.view');
});

Route::middleware('auth')->group(function () {
    Route::controller(VerificationController::class)->group(function () {
        Route::get('email/verify', 'show')->name('verification.notice');
        Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');
        Route::get('email/resend', 'resend')->name('verification.resend');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });

});


/*** 
 * Admin Routes
 */

Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', function () {
        return redirect('admin/login');
    });

    Route::post('shipping/create', [ShippingController::class, 'createShipment'])->name('shipping.create-shipment');
    Route::post('shipping/label/download', [ShippingController::class, 'downloadShippingLabel'])->name('shipping.label.download');

    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('dashboard', [AdminHomeController::class, 'dashboard'])->name('admin.dashboard');
        // Route::get('update-password', [AdminHomeController::class, 'updatePassword']);
        // Route::post('update-current-pwd', [AdminHomeController::class, 'updateCurrentPassword']); 
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        Route::get('categories', [CategoryController::class, 'listCategories']);
        Route::match(['get', 'post'], 'add-edit-category/{id?}', [CategoryController::class, 'addEditCategory']);
        Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus']);
        Route::get('delete-category/{id}', [CategoryController::class, 'deleteCategory']);

        Route::get('products', [ProductController::class, 'listProducts']);
        Route::post('update-product-status', [ProductController::class, 'updateProductStatus']);
        Route::match(['get', 'post'], 'add-edit-product/{id?}', [ProductController::class, 'addEditProduct']);
        Route::get('delete-product/{id}', [ProductController::class, 'deleteProduct']);
        Route::post('update-product-status', [ProductController::class, 'updateProductStatus']);
        Route::get('product/list-reviews/{id}', [ProductController::class, 'productListReviews']);

        // Attributes
        Route::match(['get', 'post'], 'add-attributes/{id}', [ProductController::class, 'addAttributes']);
        Route::post('edit-attributes/{id}', [ProductController::class, 'editAttributes']);
        Route::post('update-attribute-status', [ProductController::class, 'updateAttributeStatus']);
        Route::get('delete-attribute/{id}', [ProductController::class, 'deleteAttribute']);

        // Images
        Route::match(['get', 'post'], 'add-images/{id}', [ProductController::class, 'addImages']);
        Route::post('update-image-status', [ProductController::class, 'updateImageStatus']);
        Route::get('delete-image/{id}', [ProductController::class, 'deleteImage']);

        // Admins / Sub-Admins
        Route::get('admins-subadmins', [AdminHomeController::class, 'adminsSubadmins']);
        Route::match(['get', 'post'], 'add-edit-admin-subadmin/{id?}', [AdminHomeController::class, 'addEditAdminSubadmin'])->name('admin.addEditAdminSubadmin');
        Route::post('toggle-status/{id}', [AdminHomeController::class, 'toggleStatus'])->name('admin.toggleStatus');
        Route::match(['get', 'post'], 'permissions/{admin_id}/{role_id}', [AdminHomeController::class, 'addEditPermissions']);

        Route::post('update-admin-status', [AdminHomeController::class, 'updateAdminStatus']);
        Route::get('delete-admin/{id}', [AdminHomeController::class, 'deleteAdminSubAdmin']);
        // Route::match(['get', 'post'], 'update-role/{id}', [AdminHomeController::class, 'updateRole']);
        Route::match(['get', 'post'], 'update-other-setting/{id}', [AdminHomeController::class, 'updateOtherSettings']);

        // Coupon
        Route::get('coupons', [CouponsController::class, 'listCoupons']);
        Route::post('update-coupon-status', [CouponsController::class, 'updateCouponStatus']);
        Route::match(['get', 'post'], 'add-edit-coupon/{id?}', [CouponsController::class, 'addEditCoupon']);
        Route::get('delete-coupon/{id}', [CouponsController::class, 'deleteCoupon']);

        // Customer
        Route::get('customers', [CustomersController::class, 'listCustomers']);
        Route::get('guest-customers', [CustomersController::class, 'guestCustomers']);
        Route::get('non-guest-customers', [CustomersController::class, 'nonGuestCustomers']);
        Route::get('delete-customer/{id}', [CustomersController::class, 'deleteCustomer']);
        Route::post('update-customer-status', [CustomersController::class, 'updateCustomerStatus']);

        // Order
        Route::get('orders', [OrdersController::class, 'listOrders']);
        Route::get('order/{id}', [OrdersController::class, 'orderDetails'])->name('order-details');
        Route::post('order/status/update/{orderId}', [OrdersController::class, 'updateStatus'])->name('update-order-status');
        Route::get('emails/order', [OrdersController::class, 'emailOrder']);
        Route::get('emails/order/status', [OrdersController::class, 'emailOrderStatus']);

        Route::get('view-order-invoice/{uuid}', [OrdersController::class, 'viewOrderInvoice']);
        Route::get('print-pdf-invoice/{uuid}', [OrdersController::class, 'printPDFInvoice']);

        Route::match(['get', 'post'], 'add-edit-order/{uuid?}', [OrdersController::class, 'addEditOrder']);
        Route::get('delete-order/{uuid}', [OrdersController::class, 'deleteOrder']);

        // Newsletters
        Route::get('newsletter-subscribers', [NewsletterController::class, 'listNewsletter']);
        Route::get('delete-newsletter/{id}', [NewsletterController::class, 'deleteNewsletter']);

        // Contacts
        Route::get('contacts', [ContactsController::class, 'listContact']);
        Route::get('delete-contact/{id}', [ContactsController::class, 'deleteContact']);

        // Banners 
        Route::get('banners', [BannersController::class, 'listBanners']);
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', [BannersController::class, 'addEditBanner']);
        Route::post('update-banner-status', [BannersController::class, 'updateBannerStatus']);
        Route::get('delete-banner/{id}', [BannersController::class, 'deleteBanner']);
    });
});


require __DIR__.'/auth.php';
