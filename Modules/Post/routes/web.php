<?php

use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\PostController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('posts', PostController::class)->names('post');
});
