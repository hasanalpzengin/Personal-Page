@extends('layouts.simple')

@section('title','Blogs')

@section('content')

    @if(count($blogs)>0)
        <div class="mx-auto my-4">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="blog card mx-auto col-12 col-md-5 m-1 px-0">
                    <div class="card-img-top mx-auto" style="width: 100%; height: 200px; overflow: hidden;">
                        <img src="/image/cover_images/{{ $blog->image_name }}" style="width: 100%;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{!! str_limit($blog->text, $limit = 150, $end="...") !!}</p>
                        <p class="card-text text-right my-0 py-0"><small class="text-muted">{{ $blog->created_at }}</small></p>
                        <a href="/blogs/{{ $blog->id }}" class="btn btn-primary">Read More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        @include('partials.no_content')
    @endif
@stop

@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <li class="list-group-item"><a href="/blogs/new"><i class="far fa-plus-square"></i> Create Blog</a></li>
    </ul>
@stop