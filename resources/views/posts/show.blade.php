@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <div class="text-secondary">
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->title }}</a> &middot; {{ $post->created_at->format('d F, Y') }}
        </div>
        <hr>
        <p>{{ $post->body }}</p>
    </div>
@endsection