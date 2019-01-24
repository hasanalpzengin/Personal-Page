@extends('layouts.simple')

@section('title', "Logs")

@section('content')
    <h4 class="h4 my-4">Users</h4>
    <div class="container mb-2" style="overflow: scroll; max-height: 600px;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Log</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <th scope="row">{{$log->id}}</th>
                        <td>{{$log->uid}}</td>
                        <td>{{$log->log}}</td>
                        <td>{{$log->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop


@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
@stop