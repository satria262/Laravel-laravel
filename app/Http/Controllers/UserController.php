<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('register');
    }
    public function register(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            ]);

            // dd($request);
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);
        // dd($user);

        // Logika registrasi pengguna di sini, misalnya menyimpan data ke database

        return redirect()->route('home')->with('success', 'Registration successful!');
    }
}
