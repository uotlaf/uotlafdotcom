<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['article' => 'home', 'enable_right_card' => true, 'title' => __('default.home')]);
});

Route::get('/posts', function () {
    return view('home', ['view' => 'posts', 'enable_right_card' => false, 'title' => __('default.posts')]);
});

Route::get("/posts/{post_name}", function(String $post_name) {
    if (Article::where('identifier', $post_name)->exists()) {
    return view('home', ['article' => $post_name, 'enable_right_card' => false, 'title' => __('default.home')]);
    }
    return null;
});
