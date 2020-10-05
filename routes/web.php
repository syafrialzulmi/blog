<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', 'HomeController');

Route::middleware('auth')->group(function() {
    Route::get('all-posts', 'PostController@index')->name('posts.index')->withoutMiddleware('auth');
    Route::get('posts/create', 'PostController@create');
    Route::post('posts/store', 'PostController@store');
    Route::get('posts/{post:slug}/edit', 'PostController@edit');
    Route::patch('posts/{post:slug}/edit', 'PostController@update');
    Route::delete('posts/{post:slug}', 'PostController@destroy');
    Route::get('posts/{post:slug}', 'PostController@show')->withoutMiddleware('auth');
});

Route::get('categories/{category:slug}', 'CategoryController@show');
Route::get('tags/{tag:slug}', 'TagController@show');

Route::view('about', 'about');
Route::view('contact', 'contact');
Route::view('login', 'login');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
