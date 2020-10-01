@extends('layouts.app', ['title' => 'New Post'])
{{-- @section('title', 'Post') --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">New posts</div>
                    <div class="card-body">
                        <form action="/posts/store" method="post">
                            @csrf
                            @include('posts.partials.form-control', ['submit' => 'Created'])                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection