<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;
use Modules\User\Http\Controllers\TransactionController;
use Modules\User\Http\Controllers\ProgressController;
use Modules\User\Http\Controllers\ForumController;
use Modules\User\Http\Controllers\ReplyController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('users', UserController::class)->names('user');
});
Route::apiResource('transactions', TransactionController::class)->names('transaction');
Route::apiResource('progress', ProgressController::class)->names('progress');
Route::apiResource('forums', ForumController::class)->names('forum');
Route::apiResource('replies', ReplyController::class)->names('reply');


