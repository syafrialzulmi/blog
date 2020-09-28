<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug) 
    {
        // return $slug;
        // $post = \App\Post::where('slug', $slug)->firstOrFail();
        $post = Post::where('slug', $slug)->firstOrFail();

        // if (is_null($post)) {
        // if (!($post)) {
        //     abort(404);
        // }

        return view('posts.show', compact('post'));
    }
}
