<?php
namespace App\Models;

use Illuminate\Support\Arr;

class Post {
    public static function all() {
        return [
        ['id' => 1, 'slug' => 'judul-artikel-1','title' => 'First Post', 'author' => 'author 1', 'article' => 'This is the article for the first post.'],
        ['id' => 2, 'slug' => 'judul-artikel-2','title' => 'Second Post', 'author' => 'author 2', 'article' => 'This is the article for the second post.'],
        ['id' => 3, 'slug' => 'judul-artikel-3','title' => 'Third Post', 'author' => 'author 3', 'article' => 'This is the article for the third post.']
    ];
    }

    public static function find($slug): array {

        $post = Arr::first(static::all(), fn($post) => $post['slug'] === $slug);
        if (!$post) {
            return abort(404);
        }
    }
}
