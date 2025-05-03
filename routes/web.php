<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\SalesController;


// Public Routes
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/pos', [PosController::class, 'pos'])->name('pos');

Route::get('/index', [InventoryController::class, 'index'])->name('index');
Route::post('/index', [InventoryController::class, 'store'])->name('store');

Route::get('/cart', [POSController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add/{id}', [POSController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [POSController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/checkout', [POSController::class, 'checkout'])->name('cart.checkout');

Route::delete('/products/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

