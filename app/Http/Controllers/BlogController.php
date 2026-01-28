<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request) {
        $posts = Post::latest()->filter($request->only('search', 'category'))->simplePaginate(6)->withQueryString();
        return view('blog', compact('posts'), [
            'title' => 'Blog Page',
            'highlight' => 'Read our latest articles!'
        ]);
    }
}
