<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\ProductController as ProductControllerApi;
use App\Models\Product;

// Public routes
Route::get('/', function () {
    $products = Product::all();
    return view('welcome', compact('products'));
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        $products = Product::all();
        return view('welcome', compact('products'));
    })->name('welcome');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/products/expensive/{amount}', [ProductController::class, 'expensiveProducts']);
});

// API routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/api/products', [ProductControllerApi::class, 'index']);
});

// Include authentication routes
require __DIR__.'/auth.php';
