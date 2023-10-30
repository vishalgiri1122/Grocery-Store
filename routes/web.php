<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductAttrController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// admin
Route::get('login', function(){
    return redirect('admin');
});
Route::get('dashboard', function(){
    return redirect('categories');
});

Route::get('admin', [AdminController::class,'showLoginPage']);
Route::post('admin', [AdminController::class,'login']);

// Forget password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//

Route::get('register',[AdminController::class,'showRegisterPage']);
Route::post('register', [AdminController::class,'register']);
//

Route::group(['middleware' =>'checkAdmin'], function(){
    // Route::get('dashboard', [AdminController::class,'dashboard'])->name('dashboard');
    Route::get('logout', [AdminController::class,'logout']);
    // Admin picture
    Route::get('admin_pic', [AdminController::class,'show_admin_pic']);
    Route::post('update_admin_pic', [AdminController::class,'update_admin_pic']);
    // Banner
    Route::get('banner', [WebsiteController::class,'showBannerIndex']);
    Route::get('add_banner', [WebsiteController::class,'add_banner_get']);
    Route::post('add_banner', [WebsiteController::class,'add_banner_post']);
    Route::get('delete_banner/{id}', [WebsiteController::class,'delete_banner'])->name('delete_banner');
    // Categories
    Route::get('categories', [CategoryController::class,'categories'])->name('categories');
    Route::get('add_category', [CategoryController::class,'show_add_category_page'])->name('add_category');
    Route::post('add_category', [CategoryController::class,'add_category'])->name('add_category');
    Route::get('/delete_category/{id}',[CategoryController::class,'delete'])->name('delete_category');
    Route::get('/edit_category/{id}',[CategoryController::class,'edit'])->name('edit_category');
    Route::post('/update_category/{id}',[CategoryController::class,'update'])->name('update_category');
    // // Brand
    // Route::get('brands', [BrandController::class,'brands'])->name('brand');
    // Route::get('add_brand', [BrandController::class,'show_add_brand_page'])->name('add_brand');
    // Route::post('add_brand', [BrandController::class,'add_brand'])->name('add_brand');
    // Route::get('/delete_brand/{id}',[BrandController::class,'delete'])->name('delete_brand');
    // Route::get('/edit_brand/{id}',[BrandController::class,'edit'])->name('edit_brand');
    // Route::post('/update_brand/{id}',[BrandController::class,'update'])->name('update_brand');
    // // Coupons
    // Route::get('coupons', [CouponController::class,'coupons'])->name('coupons');
    // Route::get('add_coupon', [CouponController::class,'show_add_coupon_page'])->name('add_coupon');
    // Route::post('add_coupon', [CouponController::class,'add_coupon'])->name('add_coupon');
    // Route::get('/delete_coupon/{id}',[CouponController::class,'delete'])->name('delete_coupon');
    // Route::get('/edit_coupon/{id}',[CouponController::class,'edit'])->name('edit_coupon');
    // Route::post('/update_coupon/{id}',[CouponController::class,'update'])->name('update_coupon');
    // // Color
    // Route::get('colors', [ColorController::class,'colors'])->name('colors');
    // Route::get('add_color', [ColorController::class,'show_add_color_page'])->name('add_color');
    // Route::post('add_color', [ColorController::class,'add_color'])->name('add_color');
    // Route::get('/delete_color/{id}',[ColorController::class,'delete'])->name('delete_color');
    // Route::get('/edit_color/{id}',[ColorController::class,'edit'])->name('edit_color');
    // Route::post('/update_color/{id}',[ColorController::class,'update'])->name('update_color');
    // // Size
    // Route::get('sizes', [SizeController::class,'sizes'])->name('sizes');
    // Route::get('add_size', [SizeController::class,'show_add_size_page'])->name('add_size');
    // Route::post('add_size', [SizeController::class,'add_size'])->name('add_size');
    // Route::get('/delete_size/{id}',[SizeController::class,'delete'])->name('delete_size');
    // Route::get('/edit_size/{id}',[SizeController::class,'edit'])->name('edit_size');
    // Route::post('/update_size/{id}',[SizeController::class,'update'])->name('update_size');
    // product
    Route::get('products', [ProductController::class,'products'])->name('products');
    Route::get('add_product', [ProductController::class,'show_add_product_page'])->name('add_product');
    Route::post('add_product', [ProductController::class,'add_product'])->name('add_product');
    Route::get('/delete_product/{id}',[ProductController::class,'delete'])->name('delete_product');
    Route::get('/edit_product/{id}',[ProductController::class,'edit'])->name('edit_product');
    Route::post('/update_product/{id}',[ProductController::class,'update'])->name('update_product');
    // ProductAttrController
    // Route::get('product_attr', [ProductAttrController::class,'productAttr'])->name('product_attr');
    // Route::get('add_product_attr', [ProductAttrController::class,'show_add_product_attr_page'])->name('add_product_attr');
    // Route::post('add_product_attr', [ProductAttrController::class,'add_product_attr'])->name('add_product_attr');
    // Route::get('/delete_product_attr/{id}',[ProductAttrController::class,'delete'])->name('delete_product_attr');
    // Route::get('/edit_product_attr/{id}',[ProductAttrController::class,'edit'])->name('edit_product_attr');
    // Route::post('/update_product_attr/{id}',[ProductAttrController::class,'update'])->name('update_product_attr');
    // order
    Route::get('orders', [OrderController::class,'orders']);
    Route::get('order_details/{id}', [OrderController::class,'order_details']);
    Route::post('order_update_status/', [OrderController::class,'order_update_status']);


});

Route::group(['middleware' =>'checkUser'], function(){
    // Route::get('/user/dashboard', [AdminController::class,'userDashboard']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/add_to_cart', [CartController::class, 'add_to_cart']);
    Route::get('/deleteCart/{id}', [CartController::class, 'deleteCart'])->name("deleteCart");
    Route::POST('/updateCart', [CartController::class, 'updateCart'])->name("updateCart");

    //
    Route::get('/checkout', [WebsiteController::class, 'checkout']);
    Route::get('/thankyou', [WebsiteController::class, 'thankyou']);
    Route::get('track_order/{id}', [OrderController::class,'track_order']);
});
// website work
Route::get('/', [WebsiteController::class, 'index']);
Route::get('/category/{category_slug}', [WebsiteController::class, 'searchCategory']);
Route::get('/search/{slug}', [WebsiteController::class, 'searchProduct']);
Route::get('/search-suggestions', [WebsiteController::class, 'searchSuggestions']);
Route::get('/user/register', function () {
    return view('website.user_register',["title" => "Register"]);
});

Route::get('/user/login', function () {
    return view('website.user_login', ["title" => "Login"]);
})->name('user.login');

Route::get('logout', [UserController::class, 'logout']);
Route::post('saveUser', [UserController::class, 'saveUser']);
Route::post('userLogin', [UserController::class, 'userLogin']);
// google authentication
Route::get('google/login/', [GoogleController::class, 'provider'])->name('google.login');
Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback']);
// google authentication
Route::get('/about', function () {
    return view('website.about');
});
Route::get('/blog', function () {
    return view('website.blog');
});
// Route::get('/cart', function () {
//     return view('website.cart');
// });

Route::get('/contact', function () {
    return view('website.contact');
});
Route::get('/services', function () {
    return view('website.services');
});

Route::get('/product_detail/{id}', [WebsiteController::class, 'product_details']);
Route::get('/shop', [WebsiteController::class, 'shop']);


// stripe payment
Route::controller(StripeController::class)->group(function(){

    Route::post('on_delivery', 'on_delivery');
    Route::post('stripe1', 'stripe');

    Route::post('stripe', 'stripePost')->name('stripe.post');

});
// Route::get('/', function(){
//     return redirect('admin');
// });
