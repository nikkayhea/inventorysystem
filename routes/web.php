<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;

// Public Routes
Route::get('/', fn() => redirect()->route('login'));

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/pos', [HomeController::class, 'pos'])->name('pos'); // ✅ keep only one POS route
Route::get('/sales', [SalesController::class, 'sales'])->name('sales');

Route::get('/index', [InventoryController::class, 'index'])->name('index');
Route::post('/index', [InventoryController::class, 'store'])->name('store');

Route::get('/cart', [HomeController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add/{product_id}', [HomeController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{product_id}', [HomeController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/checkout', [HomeController::class, 'checkout'])->name('cart.checkout');

Route::get('/add', [InventoryController::class, 'create'])->name('create');


Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');

Route::get('/profile', fn() => view('profile'))->name('profile');

Route::delete('/products/{product_id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Default Laravel routes
Auth::routes();

Route::get('/home', [HomeController::class, 'pos'])->name('home');


