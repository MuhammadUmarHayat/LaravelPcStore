<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PayPalController;


Route::get('/', function () {
    return view('welcome');
});

// Resource routes for items and categories
Route::resource('items', ItemController::class);
Route::resource('categories', CategoryController::class);

// Route for listing items by category
Route::get('/categories/{id}/items', [ItemController::class, 'itemsByCategory'])->name('items.by_category');

// Authentication routes
Route::prefix('auth')->group(function () {
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// Dashboard routes for admin and customer
Route::middleware('auth')->group(function ()
 {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('customer/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');
});

// Grouped routes for authenticated users
Route::middleware(['auth'])->group(function () {
    // Cart routes
    Route::prefix('cart')->group(function () {
        Route::post('add/{item}', [CartController::class, 'addToCart']);
        Route::delete('remove/{item}', [CartController::class, 'removeFromCart']);
        Route::patch('edit/{item}', [CartController::class, 'editCartItem']);
        Route::get('/', [CartController::class, 'viewCart'])->name('cart.view');
    });

    // Order routes
    Route::prefix('order')->group(function () {
        Route::post('/', [OrderController::class, 'createOrder'])->name('order.create');
        Route::get('orders', [OrderController::class, 'viewOrders'])->name('order.view');
    });

    // Stripe routes
    Route::get('stripe', function () {
        return view('stripe');
    })->name('stripe.view');
    Route::post('stripe', [StripeController::class, 'handlePost'])->name('stripe.post');

    // PayPal routes
    Route::prefix('paypal')->group(function () {
        Route::get('create', [PayPalController::class, 'createPayment'])->name('paypal.create');
        Route::get('capture', [PayPalController::class, 'capturePayment'])->name('paypal.capture');
        Route::get('success', [PayPalController::class, 'success'])->name('paypal.success');
        Route::get('error', [PayPalController::class, 'error'])->name('paypal.error');
    });
});
