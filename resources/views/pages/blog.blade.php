@extends('layouts.simple')

@section('external_resources')
    <script src="/js/intense.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@stop

@section('title', $blog->title)

@section('content')
    <div class="container mt-4">
        <div class="blog my-2">
            <div class="w-100 text-center" style="height: 200px; overflow: hidden;"><img class="w-100 intense" src="/image/cover_images/{{ $blog->image_name }}" style="width: 100%;"></div>
            <h4 class="blog-title">{{ $blog->title }}</h4>
            <span class="blog-owner"><a href="/users/{{ $blog->uid }}">by {{ $blog->username }}</a></span>
            <hr>
            <p class="blog-content">{!! $blog->text !!}</p>
            <p class="blog-date"><b>Post:</b> {{$blog->created_at }}</p>
        </div>
        <hr>
        @foreach($comments as $comment)
        <div class="row comment my-2">
            <div class="col-2">
                <img class="pull-left" width="100%" height="auto" src="{{ asset('image/no-image.png') }}">
                <p class="text-center"><a href="/users/{{ $comment->uid }}">{{ $comment->username }}</a></p>
            </div>
            <div class="card col-10">
                <div class="card-body">
                    <p class="card-text">{{ $comment->text }}</p>
                    <p class="card-text" style="position: absolute; bottom: 10px;"><small><b>Post:</b> {{ $comment->created_at }}</small></p>
                    @if(Session::get('permission')>5)
                    <a class="float-right text-danger" href="/comments/delete/{{ $comment->id }}" style="position: absolute; right: 20px; top: 20px;"><i class="fas fa-trash-alt"></i></a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(Session::has('id'))
        {!! Form::open(array('url'=>'/blogs/comment', 'class'=>'form w-100 mt-5')) !!}       
        <div class="card row">
            <div class="card-body p-2">
                <input name="topic" type="hidden" value="{{ $blog->id }}">
                <textarea name="text" class="form-control w-100" placeholder="Enter Text"></textarea>
                <button type="submit" class="btn btn-primary mt-2">Publish</button>
            </div>
        </div>
        {!! Form::close() !!}
    @endif

    <script>
        window.onload = function(){
            var image = document.querySelectorAll('img');
            Intense(image);
        }
    </script>

    <style>
        img{
            cursor: url("http://tholman.com/intense-images/img/plus_cursor.png") 25 25, auto;
            position: relative;
        }
    </style>
@stop


@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <li class="list-group-item"><a href="/blog/edit/{{ $blog->id }}"><i class="fas fa-edit"></i> Edit Blog</a></li>
        <li class="list-group-item"><a href="/blog/delete/{{ $blog->id }}"><i class="fas fa-trash-alt"></i> Delete Blog</a></li>
    </ul>
@stop