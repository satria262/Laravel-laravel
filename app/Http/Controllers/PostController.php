<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('author_id', auth()->id())->latest()->simplePaginate(6)->withQueryString();
        $count = count($posts);
        return view('own', [ 'title' => auth()->user()->username . "'s blog", 'highlight' => "Posts made by you, " . auth()->user()->name, 'posts' => $posts, 'count' => $count]);
    }

    public function categoryPenjurusan(Request $request ,Category $category) {
        $posts = $category->posts()->filter($request->only('search', 'category'))->with('category')->latest()->simplePaginate();
        return view('blog', ['title' => 'Laraveleven Blog', 'highlight' => 'Posted in ' . $category->name, 'posts' => $posts]);
    }

    public function authorPenjurusan(Request $request ,User $user) {
        $posts = $user->posts()->filter($request->only('search', 'category'))->with('author')->latest()->simplePaginate();
        return view('blog', ['title' => 'Made by ' . $user->name, 'highlight' => 'Made by ' . $user->name, 'posts' => $posts]);
    }

    public function store(Request $request) {
            $category = Category::where('name', $request->categoryName)->first();

            if (!$category) {
                $ctgr = Category::create([
                    'name' => $request->categoryName,
                    'slug' => Str::slug($request->categoryName)
                ]);
            }

            $category = Category::where('name', $request->categoryName)->first();
            $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title ),
            'author_id' => auth()->id(),
            'category_id' => $category->id,
            'article' => $request->article
        ]);

        return redirect(route('add', absolute: false));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Post $post)
    {
        return view('action.detail', compact('post'), [
            'title' => 'Detail',
            'highlight' => $post->title . "'s detail",
        ]);
    }

    public function edit(Post $post)
    {
        return view('action.update', compact('post'), [
            'title' => 'Edit',
            'highlight' => 'Editing ' . $post->title,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post) : RedirectResponse
    {
        $category = Category::where('name', $request->categoryName)->first();

        if (!$category) {
            $ctgr = Category::create([
                'name' => $request->categoryName,
                'slug' => Str::slug($request->categoryName)
            ]);
        }

        $category = Category::where('name', $request->categoryName)->first();
        $post->update(array_merge($request->all(),
        ['category_id' => $category->id]
        ));
        return redirect()->back()->withSuccess('Your post is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) : RedirectResponse
    {
        $post->delete();
        return redirect()->route('own.index')->withSuccess('Your post is deleted successfully');
    }
}
