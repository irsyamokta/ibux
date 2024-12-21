<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomepageController::class, 'index'])->name('guest');
Route::get('/search', [HomepageController::class, 'search'])->name('search');

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/home', [HomepageController::class, 'index'])->name('homepage');
    
    Route::get('/product/detail/{id}', [HomepageController::class, 'view'])->name('view');
    Route::post('/product/cart', [HomepageController::class, 'cartStore'])->name('cart.store');
    Route::get('/cart', [HomepageController::class, 'cartView'])->name('cart.view');
    Route::post('/cart/update/{id}', [HomepageController::class, 'updateQuantity'])->name('cart.update');
    Route::get('/cart/{id}', [HomepageController::class, 'cartDestroy'])->name('cart.destroy');

    Route::get('/checkout', [HomepageController::class, 'checkout'])->name('checkout');

    Route::get('/midtrans/payment', [MidtransController::class, 'index'])->name('midtrans.payment');

    Route::post('/order', [OrderController::class, 'checkout'])->name('order.store');
    Route::get('/order/history', [OrderController::class, 'index'])->name('order.detail');
    Route::post('/order/confirm/{id}', [OrderController::class, 'confirm'])->name('order.confirm');

    Route::get('/home/search', [HomepageController::class, 'search'])->name('products.search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [DashboardController::class, 'product'])->name('products');

    Route::get('/product/store', [ProductController::class, 'form'])->name('product.form');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/update/{id}', [ProductController::class, 'view'])->name('product.view');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/orders', [DashboardController::class, 'order'])->name('orders');
    Route::get('/orders/update/{id}', [DashboardController::class, 'view'])->name('order.view');
    Route::post('/orders/update/{id}', [DashboardController::class, 'update'])->name('order.update');
});

require __DIR__.'/auth.php';
