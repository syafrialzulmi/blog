<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{    
    public function index()
    {
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

        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $attr = $request->all();

        $slug = \Str::slug(request('title'));

        $attr['slug'] = $slug;        

        // $thumbnail = request()->file('thumbnail');
        // $thumbnailUrl = $thumbnail->storeAs("images/posts", "{$slug}.{$thumbnail->extension()}");
        // $thumbnailUrl = $thumbnail->store("images/posts");

        $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store("images/posts") : null;

        // if (request()->file('thumbnail')) {
        //     $thumbnail = request()->file('thumbnail')->store("images/posts");
        // } else {
        //     $thumbnail = null;
        // }

        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnail;

        // $attr['user_id'] = auth()->id();

        $post = auth()->user()->posts()->create($attr);

        $post->tags()->attach(request('tags'));

        session()->flash('success', 'The post was created');
        // session()->flash('error', 'The post was created');

        // return redirect()->to('all-posts');
        return redirect()->route('posts.index');
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
        $this->authorize('update', $post);

        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        if (request()->file('thumbnail')) {
            \Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images/posts");
        } else {
            $thumbnail = $post->thumbnail;
        }

        

        $attr = $request->all();

        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnail;

        $post->update($attr);

        $post->tags()->sync(request('tags'));

        session()->flash('success', 'The post was updated');

        // return redirect()->to('posts');
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        \Storage::delete($post->thumbnail);

        // if(auth()->user()->is($post->author)) {
            $post->tags()->detach();
            $post->delete();        

            session()->flash('success', 'The post was destroyed');
            // return redirect()->to('posts');
            return response()->json(['status' => 'Post was destroyd']);
        // }         
    }
    
}
