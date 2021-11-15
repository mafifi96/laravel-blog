<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditorAndGuestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
});

Route::group(['prefix' => 'editor', 'middleware' => ['auth', 'editor']], function () {

    /* Editor -> Routes */

    Route::get('/profile', [UserController::class, 'editor']);
    Route::get('/post/{post}', [EditorController::class, 'post']);
    Route::get('/post/create', [EditorController::class, 'post_create']);
    Route::get('/post/{post}/edit', [EditorController::class, 'post_edit']);
    Route::post('/post/store', [EditorController::class, 'post_store']);
    Route::put('/post/{post}/update', [EditorController::class, 'post_update']);
    Route::delete('/post/{post}/delete', [EditorController::class, 'post_delete']);

});


require __DIR__ . '/auth.php';
