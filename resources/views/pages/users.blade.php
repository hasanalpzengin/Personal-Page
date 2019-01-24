@extends('layouts.simple')

@section('title', "Users")

@section('content')
    <h4 class="h4 my-4">Users</h4>
    <div class="container mb-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Join Date</th>
                    <th scope="col">Inspect</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->permission}}</td>
                        <td>{{$user->created_at}}</td>
                        <td><a class="btn btn-primary" href="/users/{{$user->id}}">Inspect</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop


@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <li class="list-group-item"><a href="/users/new"><i class="far fa-plus-square"></i> Add User</a></li>
    </ul>
@stop