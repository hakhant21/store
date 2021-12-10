<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ConfirmationController;


Route::middleware(['guest'])->group(function(){
    // Landing Page Route
    Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');
    //Shopping Page Route
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');
    // Search Products
    Route::get('/search', [ShopController::class, 'search'])->name('search');
    // Add To Cart Route
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
    // Checkout Route
    Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout.index')->middleware(['auth']);
    Route::post('/checkout', [CheckOutController::class, 'store'])->name('checkout.store');
    // Guest Checkout
    Route::get('/guestCheckout', [CheckOutController::class, 'index'])->name('guestCheckout.index');
    // Thanks and confirmation route
    Route::get('/thanksyou', [ConfirmationController::class, 'index'])->name('confirmation.index');

});


//Admin dashboard route
Route::group(['prefix' => 'admin'], function () {
   Voyager::routes();
});
// Auth Route
require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth', 'prefix' => 'users'],function(){
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/my-profile', [UsersController::class, 'edit'])->name('users.edit');
    Route::patch('/my-profile', [UsersController::class, 'update'])->name('users.update');
    Route::get('/my-orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/my-orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
});
// User Profile and Orders Route



