<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except([
    //             'index', 
    //             'show',
    //         ]);
    // }
    
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
        return view('posts.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function store(PostRequest $request)
    {
        $attr = $request->all();

        $attr['slug'] = \Str::slug(request('title'));

        $attr['category_id'] = request('category');

        $post = Post::create($attr);

        $post->tags()->attach(request('tags'));

        session()->flash('success', 'The post was created');
        // session()->flash('error', 'The post was created');

        return redirect()->to('posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $attr = $request->all();

        $attr['category_id'] = request('category');
        $post->update($attr);

        $post->tags()->sync(request('tags'));

        session()->flash('success', 'The post was updated');

        return redirect()->to('posts');
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();        

        session()->flash('success', 'The post was destroyed');
        // return redirect()->to('posts');
        return response()->json(['status' => 'Post was destroyd']);
    }
    
}
