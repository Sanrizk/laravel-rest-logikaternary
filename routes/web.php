<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

// 4|k3NBsDvDRo4A50VORxIvuAtscOt7ULhBVzx2c0QDed0983ce => plaintext token auth

Route::get('/', function () {
    return view('welcome');
});

Route::get('/token', function () {
    return view('gentoken');
})->middleware('auth');

// Route::post('/tokens/create', function (Request $request) {
//     // dd($request->user());
//     // return $request->user()->username;
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});


// Route::get('/login', [UserController::class, 'showLogin'])->name('login');
// Route::post('/login', [UserController::class, 'login']);

// Route::get('/register', [UserController::class, 'showRegister'])->name('register');
// Route::post('/register', [UserController::class, 'register']);

