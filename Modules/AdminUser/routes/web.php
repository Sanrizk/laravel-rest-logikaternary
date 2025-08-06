<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminUser\Http\Controllers\AdminUserController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('adminusers', AdminUserController::class)->names('adminuser');
});

Route::post('/logout/adm', [AdminUserController::class, 'logout']);

Route::get('/login/adm', [AdminUserController::class, 'showLogin']);
Route::post('/login/adm', [AdminUserController::class, 'login']);
