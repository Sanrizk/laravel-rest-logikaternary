<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminUser\Http\Controllers\AdminUserController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('adminusers', AdminUserController::class)->names('adminuser');
});
