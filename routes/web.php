<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('home');
});

Route::view('about', 'about');
Route::view('contact', 'contact');
Route::view('login', 'login');

// Route::get('about', function() {
// Route::get('about', function(Request $request) {
    // return $request->fullUrl(); //http://127.0.0.1:8000/about
    // request()->fullUrl()

    // return $request->path();    //about
    // request()->path()
    // return request()->is('about') ? true : false;
    // return view('home');
// });