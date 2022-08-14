<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditorAndGuestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EditorProfileController;

/* Public Routes */

Route::get('/', [PageController::class, 'index']);
Route::get('/post/{post}', [PageController::class, 'post'])->where(['post'=> '^[a-z0-9]+(?:-[a-z0-9]+)*$']);
Route::get('/category/{category}/{name}', [PageController::class, 'category']);
Route::get('/contact', [PageController::class, 'contcat']);
Route::get('/about', [PageController::class, 'about']);
Route::post('/post/{post}/comment/store', [CommentController::class, 'store']);
Route::delete('/post/{post}/comment/{commente}/delete', [CommentController::class, 'delete']);
Route::put('/Post/{post}/comment/{comment}/update', [CommentController::class, 'update']);
Route::get('/tag/{tag}', [PageController::class , 'tag']);

Route::get('/search', [PageController::class , 'search']);


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    /* Admin -> Post Routes */
    Route::get('/dashboard', [UserController::class, 'admin']);
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/post/create', [PostController::class, 'create']);
    Route::get('/post/{post}', [PostController::class, 'show'])->where(['post'=> '^[a-z0-9]+(?:-[a-z0-9]+)*$']);
    Route::post('/post/store', [PostController::class, 'store']);
    Route::get('/post/{post}/edit', [PostController::class, 'edit']);
    Route::put('/post/{post}/update', [PostController::class, 'update']);
    Route::delete('/post/{post}/delete', [PostController::class, 'destroy']);
    /* Admin -> Category Routes */

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/category/{category}', [CategoryController::class, 'show'])->where(['category'=> '^[0-9]+$']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{category}/update', [CategoryController::class, 'update']);
    Route::post('/category/delete', [CategoryController::class, 'destroy']);

    /* Admin -> All Users Routes */

    Route::get('/users', [EditorAndGuestController::class, 'index']);
    Route::get('/user/{user}', [EditorAndGuestController::class, 'show'])->where(['user'=> '^[0-9]+$']);
    Route::get('/user/create', [EditorAndGuestController::class, 'create']);
    Route::post('/user/store', [EditorAndGuestController::class, 'store']);
    Route::get('/user/{user}/edit', [EditorAndGuestController::class, 'edit']);
    Route::put('/user/{user}/update', [EditorAndGuestController::class, 'update']);
    Route::delete('/user/{user}/delete', [EditorAndGuestController::class, 'destroy']);
    Route::post('/user/{user}/block', [EditorAndGuestController::class, 'block']);
    Route::post('/user/{user}/mute', [EditorAndGuestController::class, 'mute']);

    Route::view("/settings" , "admin.layouts.settings");
});

Route::group(['prefix' => 'editor', 'middleware' => ['auth', 'editor']], function () {

    /* Editor -> Routes */

    Route::get('/profile', [EditorProfileController::class, 'profile']);
    Route::get('/posts', [EditorProfileController::class, 'posts']);
    Route::get('/post/create', [EditorProfileController::class, 'create_post']);
    Route::get('/post/{post}', [EditorProfileController::class, 'show_post']);
    Route::get('/post/{post}/edit', [EditorProfileController::class, 'edit_post']);
    Route::post('/post/store', [EditorProfileController::class, 'store_post']);
    Route::put('/post/{post}/update', [EditorProfileController::class, 'update_post']);
    Route::delete('/post/{post}/delete', [EditorProfileController::class, 'delete_post']);

    /* Categories Routes */

    Route::get('/categories', [EditorProfileController::class, 'categories']);
    Route::get('/category/create', [EditorProfileController::class, 'create_category']);
    Route::get('/category/{category}', [EditorProfileController::class, 'show_category']);
    Route::get('/category/{category}/edit', [EditorProfileController::class, 'edit_category']);
    Route::post('/category/store', [EditorProfileController::class, 'store_category']);
    Route::put('/category/{category}/update', [EditorProfileController::class, 'update_category']);
    Route::delete('/category/{category}/delete', [EditorProfileController::class, 'delete_category']);

    /* Users Routes */

    Route::get('/users', [EditorProfileController::class, 'users']);
    Route::get('/users/create', [EditorProfileController::class, 'create_user']);
    Route::get('/users/{user}', [EditorProfileController::class, 'show_user']);
    Route::get('/users/{user}/edit', [EditorProfileController::class, 'edit_user']);
    Route::post('/users/store', [EditorProfileController::class, 'store_user']);
    Route::put('/users/{user}/update', [EditorProfileController::class, 'update_user']);
    Route::delete('/users/{user}/delete', [EditorProfileController::class, 'delete_user']);

});


require __DIR__ . '/auth.php';
