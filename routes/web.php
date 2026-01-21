<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about', ['name' => 'John Doe']);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/register',[UserController::class, 'index']);
Route::post('/register',[UserController::class, 'register'])->name('register');
