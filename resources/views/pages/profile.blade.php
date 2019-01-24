@extends('layouts.simple')


@section('title', $user->username)

@section('content')
    <div class="container">
        <div class="card my-4 w-75">
            <div class="card-header">
                <b>{{strtoupper($user->username)}}</b>
            </div>
            @if($user->gender=='F')
            <img alt="user picture gender" class="rounded-circle card-img-top mx-auto mt-4" src="/image/female.jpg" style="width: 50%;">
            @elseif($user->gender=='M')
            <img alt="user picture gender" class="rounded-circle card-img-top mx-auto mt-4" src="/image/male.jpg" style="width: 50%;">
            @else
            <img alt="user picture gender" class="rounded-circle card-img-top mx-auto mt-4" src="/image/other.jpg" style="width: 50%;">
            @endif
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Name:</b> {{$user->name}} </li>
                    <li class="list-group-item"><b>Surname:</b> {{$user->surname}} </li>
                    <li class="list-group-item"><b>Gender:</b> {{$user->gender}} </li>
                    <li class="list-group-item"><b>E-mail:</b> {{$user->email}} </li>
                    <li class="list-group-item"><b>Join Date:</b> {{$user->created_at}} </li>
                </ul>
            </div>
        </div>
    </div>
@stop


@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <li class="list-group-item"><a href="/users/edit/{{ $user->id }}"><i class="fas fa-edit"></i> Edit User</a></li>
        <li class="list-group-item"><a href="/users/delete/{{ $user->id }}"><i class="fas fa-trash-alt"></i> Delete User</a></li>
    </ul>
@stop