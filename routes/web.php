<?php

use  App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MLController;
use App\Http\Controllers\HomeController;


// Route lainnya yang sudah ada di sini

// Route untuk prediksi machine learning
Route::get('/predict', [MLController::class, 'predict']);
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Login
Route::get('/registrasi', [AuthController::class, 'Registrasi'])->name('registrasi');
Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');
Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit'); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

route::resource('Home', \App\Http\Controllers\HomeController::class);
route::resource('About', \App\Http\Controllers\AboutController::class);
route::resource('Shop', \App\Http\Controllers\ShopController::class);
route::resource('ProductDetail', \App\Http\Controllers\ProductDetailController::class);
route::resource('Blog', \App\Http\Controllers\BlogController::class);
route::resource('Blogdetail', \App\Http\Controllers\BlogdetailController::class);
route::resource('Contact', \App\Http\Controllers\ContactController::class);
route::resource('Shoppingcart', \App\Http\Controllers\ShoppingcartController::class);
route::resource('Keranjang', \App\Http\Controllers\ShoppingcartController::class);


route::middleware('auth')->group(function () {
// Admin Routes
Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::resource('Admin', \App\Http\Controllers\AdminController::class);
    route::resource('Paymentmethod', \App\Http\Controllers\PaymentmethodController::class);
    route::resource('Clothes', \App\Http\Controllers\ClothesController::class);    
    route::resource('Order', \App\Http\Controllers\OrderController::class);    

});

// Owner Routes     
Route::middleware(['auth', 'level:owner'])->group(function () {
    Route::resource('Owner', \App\Http\Controllers\OwnerController::class);
});

// Courier Routes
Route::middleware(['auth', 'level:kurir'])->group(function () {
    Route::resource('Courier', \App\Http\Controllers\CourierController::class);
});



});

 











