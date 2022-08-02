<?php

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\admin\ResetPassword;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\admin\productDetails;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\admin\SearchController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\products\CartController;
use App\Http\Controllers\products\OrderController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\payment\PaymentController;
use App\Http\Controllers\admin\AddproductController;
use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\payment\CheckoutController;
use App\Http\Controllers\admin\BulkMessageController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\products\ViewProductController;
use App\Http\Controllers\admin\TransactionDetailsController;
use App\Http\Controllers\admin\CartController as AdminCartController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\LogoutController as AdminLogoutController;
use App\Http\Controllers\SearchController as ControllersSearchController;
use App\Http\Controllers\admin\AddressController as AdminAddressController;
use App\Http\Controllers\DashboardController as ControllersDashboardController;
use App\Http\Controllers\products\ProductController as ProductsProductController;
use App\Http\Controllers\admin\TransactionController as AdminTransactionController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


Auth::routes(['verify'=> true]);

// main routes

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [AuthLoginController::class, 'index'])->name('login');
Route::post('/login', [AuthLoginController::class, 'login']);
Route::get('forgot-password',function(){
    return view('auth\passwords\email');
})->name('forgot-password');
Route::get('/product', [ProductsProductController::class, 'index'])->name('main-product');
Route::get('/product/{product}', [ViewProductController::class, 'index'])->name('view-product');
Route::get('search/{search}', [ControllersSearchController::class, 'index'])->name('search-result');
Route::post('search', [ControllersSearchController::class, 'search'])->name('searching');
Route::get('about-us', [AboutController::class, 'index'])->name('about');
Route::get('contact', [ContactController::class, 'index'])->name('contact');



Route::middleware('auth')->group(function(){
Route::get('/dashboard',[ControllersDashboardController::class, 'index'])->name('dashboard');
Route::put('/dashboard',[ControllersDashboardController::class, 'update']);

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/{product}', [WishlistController::class, 'store'])->name('add-to-wishlist');
Route::delete('/wishlist/{product}', [WishlistController::class, 'delete'])->name('add-to-wishlist');

Route::get('/carts', [CartController::class, 'index'])->name('cart');
Route::post('/carts/{product}', [CartController::class, 'store'])->name('carts');
Route::delete('/carts/{product}', [CartController::class, 'delete'])->name('carts');
Route::put('/carts/{product}', [CartController::class, 'update'])->name('carts');
Route::get('/address',[AddressController::class, 'index'])->name('address');
Route::post('/address',[AddressController::class, 'store']);
Route::put('/address',[AddressController::class, 'update']);

Route::post('/pay',[PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback',[PaymentController::class, 'handleGatewayCallback']);
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/transaction', [TransactionController::class, 'index'])->name('transactions');
Route::get('transactions/{transaction}', [OrderController::class, 'index'])->name('transaction');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});


//beginning admin routes

Route::get('/admin/login', [LoginController::class, 'index'])->name('admin-login');
Route::post('/admin/login', [LoginController::class, 'login']);


Route::middleware('is_admin')->group(function() {
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
Route::put('/admin/dashboard', [DashboardController::class, 'updateProfile']);
Route::post('/admin/dashboard', [DashboardController::class, 'postRequest'])->name('searches');

Route::get('/admin/add-product', [AddproductController::class, 'index'])->name('add-product');
Route::post('/admin/add-product', [AddproductController::class, 'store']);

Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
Route::delete('/admin/product/{product}', [ProductController::class, 'delete'])->name('delete-product');


Route::get('/admin/product-details/{product}', [productDetails::class, 'index'])->name('product-details');
Route::put('/admin/product-details/{product}', [productDetails::class, 'update']);

Route::get('/admin/search/{search}', [SearchController::class, 'index'])->name('search');

Route::get('/admin/users', [UsersController::class, 'index'])->name('users');
Route::delete('/admin/users/{user}', [UsersController::class, 'delete'])->name('user-delete');

Route::get('/admin/reset-password',[ResetPassword::class, 'index'])->name('reset-password');
Route::put('/admin/reset-password',[ResetPassword::class, 'store']);

Route::get('/admin/carts',[AdminCartController::class, 'index'])->name('admin-cart');
Route::delete('/admin/carts/{cart}',[AdminCartController::class, 'delete'])->name('admin-delete-cart');

Route::get('/admin/orders',[AdminOrderController::class, 'index'])->name('admin-order');

Route::get('/admin/addresses', [AdminAddressController::class, 'index'])->name('admin-address');

Route::get('/admin/transaction', [AdminTransactionController::class, 'index'])->name('admin-transaction');
Route::put('/admin/transaction/{transaction}', [AdminTransactionController::class, 'update'])->name('update-transaction');
Route::delete('/admin/transaction/{transaction}', [AdminTransactionController::class, 'delete'])->name('update-transaction');

Route::get('/admin/transaction/{transaction}', [TransactionDetailsController::class, 'index'])->name('transaction-details');

Route::get('admin/message', [BulkMessageController::class, 'index'])->name('bulk-message');
Route::post('admin/message', [BulkMessageController::class, 'send']);

Route::get('admin/tags', [TagController::class,'index'])->name('tags');
Route::post('admin/tags', [TagController::class,'tagCategory']);
Route::delete('admin/tags/{id}', [TagController::class, 'delete'])->name('tag_category');

Route::post('/admin/logout', [AdminLogoutController::class, 'logout'])->name('admin-logout');


});

// end of admin routes
