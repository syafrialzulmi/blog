<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts =  Post::take(5)->get();
        // $posts =  Post::latest()->paginate(5);
        // $posts =  Post::simplePaginate(5);


        return view('posts.index', [
            'posts' => Post::latest()->paginate(5),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attr = request()->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ]);

        $attr['slug'] = \Str::slug(request('title'));

        Post::create($attr);

        session()->flash('success', 'The post was created');
        // session()->flash('error', 'The post was created');

        return redirect()->to('posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $attr = request()->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ]);

        $post->update($attr);

        session()->flash('success', 'The post was updated');

        return redirect()->to('posts');
    }
}
