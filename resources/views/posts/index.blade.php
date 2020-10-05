@extends('layouts.app', ['title' => 'All Post'])
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                @isset($category)
                    <h1>Category : {{ $category->title }}</h1>
                @endisset

                @isset($tag)
                    <h1>Tag : {{ $tag->title }}</h1>                
                @endisset

                @if (!isset($tag) && !isset($category))
                    <h1>All Post</h1>
                @endif
            </div>
            <div>
                @if (Auth::check())
                    <a href="/posts/create" class="btn btn-info">New posts</a>
                @endif            
            </div>
        </div>    
        <hr>    
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
                    @csrf
                    @foreach($posts as $key=>$post)
                    <tr>
                        <input type="hidden" class="delete_text_slug" value="{{ $post->slug }}">                        
                        <td>{{ $posts->firstItem() + $key  }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->body, 100) }} 
                            <a href="/posts/{{ $post->slug }}">Read more</a></td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>
                            @auth
                                <a href="/posts/{{ $post->slug }}/edit" class="btn btn-info">Edit</a>                            
                                <button class="btn btn-danger delete">Delete</button>
                            @endauth                            
                        </td>
                    </tr>
                    @endforeach

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

    <script> 
    $(document).ready(function(){

        $('.delete').click(function(e) {
            e.preventDefault();
            var delete_slug = $(this).closest("tr").find('.delete_text_slug').val();
            
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    var data = {
                        '_token': $('input[name=_token]').val(),
                        'slug': delete_slug,
                    }

                    $.ajax({
                        type: "delete",
                        url: '/posts/'+delete_slug,
                        data: data,
                        success: function (resp) {
                            swal(resp.status, {
                                icon: "success",
                            })
                            .then((result) => {
                                location.reload();
                            });
                        }
                    });                    
                } 
            });
            
        })
    })          
    </script>

@endsection