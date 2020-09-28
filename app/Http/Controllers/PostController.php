<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post) 
    {
        // $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts.show', compact('post'));
    }
}
