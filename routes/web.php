<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController');

Route::get('posts', 'PostController@index');
Route::get('posts/{post:slug}', 'PostController@show');

Route::view('about', 'about');
Route::view('contact', 'contact');
Route::view('login', 'login');
