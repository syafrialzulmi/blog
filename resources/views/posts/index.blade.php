@extends('layouts.app', ['title' => 'All Post'])
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <h1>All Post</h1>
            </div>
            <div>
                <a href="/posts/create" class="btn btn-info">New posts</a>
            </div>
        </div>        
        <div class="row">
            @if($posts->count()) 
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Create</th>
                        <th>Action</th>
                    </tr>
                    
                    {{-- @forelse($posts as $key=>$post) --}}
                    @foreach($posts as $key=>$post)
                    <tr>
                        <td>{{ $posts->firstItem() + $key  }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->body, 100) }} 
                            <a href="/posts/{{ $post->slug }}">Read more</a></td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="/posts/{{ $post->slug }}/edit" class="btn btn-info">Edit</a>
                            <form action="/posts/{{ $post->slug }}/delete" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    {{-- @empty
                        <div class="alert alert-info">
                            Tidak ada data
                        </div>
                    @endforelse --}}
    
                </table>
                {{ $posts->links() }}
            </div>
        @else
        <div class="alert alert-info">
            Tidak ada data
        </div>
        @endif
        </div>
    </div>
@endsection