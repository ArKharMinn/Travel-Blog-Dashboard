<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);

Route::prefix('category')->group(function () {
    Route::get('index', [CategoryController::class, 'index']);
    Route::post('category', [CategoryController::class, 'category']);
});

Route::prefix('post')->group(function () {
    Route::get('index', [PostController::class, 'index']);
    Route::post('search', [PostController::class, 'search']);
    Route::post('detail', [PostController::class, 'detail']);
});

Route::prefix('comment')->middleware('auth:sanctum')->group(function () {
    Route::post('add', [CommentController::class, 'add']);
});
