<?php


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


route::resource('Home', \App\Http\Controllers\HomeController::class);
route::resource('About', \App\Http\Controllers\AboutController::class);
route::resource('Shop', \App\Http\Controllers\ShopController::class);
route::resource('ProductDetail', \App\Http\Controllers\ProductDetailController::class);
route::resource('Blog', \App\Http\Controllers\BlogController::class);
route::resource('Blogdetail', \App\Http\Controllers\BlogdetailController::class);
route::resource('Contact', \App\Http\Controllers\ContactController::class);
route::resource('Shoppingcart', \App\Http\Controllers\ShoppingcartController::class);

// Admin Routes

    Route::resource('Admin', \App\Http\Controllers\AdminController::class);
    route::resource('Paymentmethod', \App\Http\Controllers\PaymentmethodController::class);
    route::resource('Clothes', \App\Http\Controllers\ClothesController::class);    
    route::resource('Orders', \App\Http\Controllers\OrdersController::class);    



// Owner Routes     

    Route::resource('Owner', \App\Http\Controllers\OwnerController::class);


// Courier Routes

    Route::resource('Courier', \App\Http\Controllers\CourierController::class);






 











