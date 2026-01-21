<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page',
        'highlight' => 'Welcome to Laraveleven!'
    ]);
});
// kedudukan posts setara dengan title dan highlight

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog Page','highlight' => 'Read our latest articles!',
    'posts' => Post::all()
    ]);
});

Route::get('/blog/{id}', function($slug) {
    $post = Post::find($slug);

    return view('post', ['title' => 'Single Post', 'highlight' => 'Single Post Page', 'post' => $post]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About Us',
        'highlight' => 'Learn more about us!'
    ]);
});
Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact Us',
        'highlight' => 'Get in touch with us!'
    ]);
});
