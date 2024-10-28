<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Mohamed Al Ghifari',
                'body' =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat repellat ratione architecto error dignissimos neque et, suscipit quasi nemo. Beatae nisi est non eos?',
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Mohamed Al Ghifari',
                'body' =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid voluptate laborum architecto, sapiente aut dignissimos unde ducimus aliquam labore consectetur adipisci voluptatem, nisi quisquam doloribus?',
            ]
        ];
    }
    public static function find($slug): array
    {

        $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);
        if (! $post) {
            abort(404);
        }
        return $post;
    }
}
