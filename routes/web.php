<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
    // $posts = Post::with('author', 'category')->latest()->get();
    // dump(request('search'));
    return view('blog', ['title' => 'Blog Page','highlight' => 'Read our latest articles!',
    'posts' => Post::filter(request(['search']))->latest()->simplePaginate(6)->withQueryString()
    ]);
});

Route::get('/blog/{post:slug}', function(Post $post) {
    return view('post', ['title' => 'Single Post', 'highlight' => 'Single Post Page', 'post' => $post, 'user' => $post->author]);
});

Route::get('/authors/{user:username}', function(User $user) {
    // $posts = $user->posts->load('category', 'author');
    return view('blog', ['title' => count($user->posts) . ' Article by ' . $user->name, 'highlight' => 'Single Post Page', 'posts' => Post::filter(request(['search']))->latest()->simplePaginate(6)->withQueryString()  ]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    // $posts = $category->posts->load('category', 'author');

    return view('blog', ['title' => 'Laraveleven Blog', 'highlight' => 'Posted in ' . $category->name, 'posts' => Post::filter(request(['search']))->latest()->simplePaginate(6)->withQueryString() ]);
});

// Route::get('/authors/{user}', function(User $user) {
//     return view('author', ['title' => 'Article by ' . $user->name, 'highlight' => 'Single Post Page', 'user' => $user,]);
// });

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
