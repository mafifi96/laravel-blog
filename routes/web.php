<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', [GuestController::class , 'index']);
Route::get('/product/{product}', [GuestController::class , 'product']);
Route::get('/category/{category}/{name}', [GuestController::class , 'category']);
Route::get("/cart" , [CartController::class , 'index']);
Route::post("/cart/add" , [CartController::class , 'add']);
Route::post("/cart/delete" , [CartController::class , 'destroy']);
Route::get('/checkout', [UserController::class , 'checkout']);
Route::post('/customer/info', [UserController::class , 'customer_info']);


Route::middleware(['auth','admin'])->group(function () {

    Route::get('/dashboard', [UserController::class , 'admin'])->name('dashboard');

    Route::get('/admin/categories',[CategoryController::class , 'index'])->name('categories');

    Route::get('/admin/category/{category}',[CategoryController::class , 'show'])->where('category' ,'[0-9]+');

    Route::get('/admin/category/create',[CategoryController::class , 'create'])->name('category_create');

    Route::post('/admin/category/store', [CategoryController::class, 'store']);

    Route::get('/admin/products',[ProductController::class ,'index'])->name('products');

    Route::get('/admin/product/create',[ProductController::class , 'create'])->name('product_create');

    Route::post('/admin/product/store', [ProductController::class, 'store']);

    Route::post('/admin/product/delete', [ProductController::class, 'destroy']);

    Route::get('/admin/orders' , [OrderController::class , 'orders']);

});

Route::middleware(['auth', 'customer'])->group(function () {

    Route::get('/customer', [UserController::class , 'customer'])->middleware('auth' , 'customer');
    Route::get('/confirm/order', [OrderController::class , 'confirm']);

});

require __DIR__.'/auth.php';
