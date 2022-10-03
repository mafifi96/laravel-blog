<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get("/posts" , [PostController::class , 'index']);
Route::get("/post/{post}" , [PostController::class , 'show']);
Route::post("/post/store" , [PostController::class , 'store']);
Route::delete('/post/{post}/delete', [PostController::class , 'destroy']);
Route::put('/post/{post}/update', [PostController::class , 'update']);
