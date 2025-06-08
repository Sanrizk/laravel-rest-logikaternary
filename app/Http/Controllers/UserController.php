<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserController extends Controller
{
    public function showLogin()
    {
        // **Cek ENV api key**
        // $response = Http::get('http://localhost:8000/api/key');
        // $apiKey = $response->json('api_key');

        // dd($response->json(0)['api_key']);

        // return view('login', [
        //     "apiKey" => $apiKey
        // ]);

        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/token');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'username' => 'johndoe421',
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pointBalance' => 0,
        ]); 

        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }
}
