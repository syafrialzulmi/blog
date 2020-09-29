@extends('layouts.app')
@section('title', 'Post')
@section('content')
    <div class="container">
        <h1>All Post</h1>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Create</th>
                    <th>Action</th>
                </tr>

                @foreach($posts as $key=>$post)
                <tr>
                    <td>{{ $posts->firstItem() + $key  }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->body, 100) }} 
                        <a href="/posts/{{ $post->slug }}">Read more</a></td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td></td>
                </tr>
                @endforeach

            </table>
            {{ $posts->links() }}
        </div>
    </div>
@endsection