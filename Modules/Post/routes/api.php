<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\PostController;
use Modules\Post\Http\Controllers\CategoryController;

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//     Route::apiResource('posts', PostController::class)->names('post');
// });
Route::apiResource('categories', CategoryController::class)->names('category');
Route::apiResource('posts', PostController::class)->names('post');
