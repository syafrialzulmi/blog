<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController');

// Route::get('/', 'HomeController@index');

// Route::get('/', function() {
//     $name = request('name');
//     return view('home', ['name' => $name]);
// });

Route::view('about', 'about');
Route::view('contact', 'contact');
Route::view('login', 'login');
