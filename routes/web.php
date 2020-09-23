<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function() {
//     return 'Homepage';
// });

// Route::get('/', function() {
//     return view('welcome');
// });

// Route::get('/contact', function() {
//     return 'Contact us';
// });

// Route::view('/', 'welcome');
// Route::view('/contact', 'contact');
// Route::view('series/create', 'series.create');

Route::get('/', function() {
    // $name = 'Sastro Meong';
    $name = '<h1>Sastro Meong</h1>';
    return view('welcome', ['name' => $name]);
});