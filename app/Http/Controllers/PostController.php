<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug) 
    {
        // return $slug;
        $post = \DB::table('posts')->where('slug', $slug)->first();

        return view('posts.show', compact('post'));
    }
}
