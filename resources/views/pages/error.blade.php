@extends('layouts.simple')

@section('title','Error')

@section('content')
    <div class="container mt-4" style="min_height: 500px;">
        <div class="alert alert-warning text-center"><i class="fas fa-exclamation-triangle"></i> {{ $error }} <i class="fas fa-exclamation-triangle"></i></div>
        <div class="wrapper mx-auto text-center">
            <img src="{{ asset('image/error.png') }}" height="200px" width="200px">
        </div>
    </div>
@stop

@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
@stop