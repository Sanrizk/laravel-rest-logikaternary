<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Route::get('/user', function (Request $request) {
//     // return response()->json([
//     //     'name' => 'Abigail',
//     //     'state' => 'CA',
//     // ]);    
//     return User::all();
//     // return $request->user();
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json(['user' => $request->user()]);
});

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $user = Auth::user()->username;
    $token = $request->user()->createToken('authToken')->plainTextToken;

    return response()->json(['token' => $token, 'user' => $user]);
});

Route::get('/auth/check', function () {
    return Auth::user();
});

Route::get('/key', function() {
    $arrJson = [
        [
            'api_key' => env('APP_API_KEY')
        ],
    ];
    
    json_encode(json_encode($arrJson));
    return $arrJson;
});
