@extends('layouts.simple')

@section('title','Home')

@section('content')
    <div class="wrapper text-center">
        <img class="mx-auto border border-primary rounded-circle my-4" width="200px" style="border-width: 5px !important;" src="{{asset('image/pp.jpg')}}" alt="Profile Photo"/></img>
        <h2 class="">I'm Hasan Alp</h2>
        <small>A Computer Engineer with Software Passion.</small>
    </div>
    <hr>
    <h5 class="h5">You can find these things from this webpage</h5>
    <div class="row justify-content-center">
        <div class="card col-3 m-2">
            <img class="card-img-top my-2" alt="CV" src="{{ asset('image/cv.png') }}"></img>
            <h5 class="card-title">My CV</h5>
            <p class="card-text">You can find my latest CV. If you want to hire or stalk me.</p>
            <a href="/cv" class="btn btn-primary mb-3">Go</a>
        </div>
        <div class="card col-3 m-2">
            <img class="card-img-top my-2" alt="Skills" src="{{ asset('image/skill.png') }}"></img>
            <h5 class="card-title">Skills</h5>
            <p class="card-text">You can find my skills and projects on that page.</p>
            <a href="/skills" class="btn btn-warning mb-3">Go</a>
        </div>
        <div class="card col-3 m-2">
            <img class="card-img-top my-2" alt="Blogs" src="{{ asset('image/blog.png') }}"></img>
            <h5 class="card-title">Blogs</h5>
            <p class="card-text">All of my blogs includes my experiences</p>
            <a href="/blogs" class="btn btn-danger mb-3">Go</a>
        </div>
        <div class="card col-3 m-2">
            <img class="card-img-top my-2" alt="About me @ Hasan Alp Zengin" src="{{ asset('image/about_me.png') }}"></img>
            <h5 class="card-title">About Me</h5>
            <p class="card-text">My history and plans...</p>
            <a href="/about" class="btn btn-info mb-3">Go</a>
        </div>
        <div class="card col-3 m-2">
            <img class="card-img-top my-2" alt="contact" src="{{ asset('image/contact.png') }}"></img>
            <h5 class="card-title">Contact</h5>
            <p class="card-text">My contact informations.</p>
            <a href="/contact" class="btn btn-success mb-3">Go</a>
        </div>
    </div>

    <span class="text-danger rand-text"><b>#OpenSource</b></span>
@stop

@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <li class="list-group-item"><a href="/profile"><i class="fas fa-user-edit"></i> Edit Profile</a></li>
        <li class="list-group-item"><a href="/users"><i class="fas fa-users"></i> Users</a></li>
        <li class="list-group-item"><a href="/logs"><i class="fas fa-history"></i> Logs</a></li>
    </ul>
@stop