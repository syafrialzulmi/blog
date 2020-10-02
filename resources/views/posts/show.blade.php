@extends('layouts.app', ['title' => 'Post detail'])
@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <div class="text-secondary">
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->title }}</a> 
            &middot; {{ $post->created_at->format('d F, Y') }}
            &middot; 
            @foreach ($post->tags as $tag)
                <a href="#">{{ $tag->title }}</a>
            @endforeach
        </div>
        <hr>
        <p>{{ $post->body }}</p>
    </div>
@endsection