<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('category')->group(function () {
    Route::get('index', [CategoryController::class, 'index']);
});

Route::prefix('post')->group(function () {
    Route::get('index', [PostController::class, 'index']);
    Route::post('search', [PostController::class, 'search']);
    Route::post('detail/{id}', [PostController::class, 'detail']);
});
