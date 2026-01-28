<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('dashboard', [
        'title' => 'Home Page',
        'highlight' => 'Welcome to Laraveleven!'
    ])  ;
});

// OWN
Route::get('/my-own', [PostController::class, 'index'])->middleware('auth');
Route::resource('own', PostController::class)->parameters(['own' => 'post'])->middleware('auth');


// BLOG
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{post:slug}', function(Post $post) {
    return view('post', ['title' => 'Single Post', 'highlight' => 'Single Post Page', 'post' => $post, 'user' => $post->author]);
});


// AUTHOR/CATEGORY
Route::get('/authors/{user:username}', [PostController::class, 'authorPenjurusan']);
Route::get('/categories/{category:slug}', [PostController::class, 'categoryPenjurusan'])->name('category-slug');


// ADDING
Route::post('/add', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::get('/add', function() {
    return view('add', [
        'title' => 'Adding new post',
        'highlight' => 'Add your own article',
        'categories' => Category::all()
    ]);
})->name('add')->middleware('auth');


// UMUM
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
Route::get('/dashboard', function () {
    return view('dashboard', [
        'title' => 'Home Page',
        'highlight' => 'Welcome to Laraveleven!'
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
