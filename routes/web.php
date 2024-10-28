<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['tittle' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Mohamed Al Ghifari', 'tittle' => 'About']);
});

Route::get('/posts', function () {
    $posts = Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString();
    return view('posts', ['tittle' => 'Blog', 'posts' => $posts]);
});


Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['tittle' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // $posts  = $user->posts->load('category', 'author');

    return view('posts', ['tittle' => count($user->posts) . 'Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // $posts  = $category->posts->load('category', 'author');

    return view('posts', ['tittle' =>  'Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['tittle' => 'Contact']);
});

