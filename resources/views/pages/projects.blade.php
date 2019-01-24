@extends('layouts.simple')

@section('title','Projects')

@section('content')
    <div class="mx-auto my-4">
        <div class="row justify-content-center">
            @foreach($datas as $project)
            <div class="project card col-12 col-md-3 col-sm-5 my-1 mx-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-text text-right my-0 py-0"><small class="text-muted">Updated at {{ substr(str_replace('T',' ',$project->last_activity_at), 0, -5) }}</small></p>
                    <a style="position: absolute; bottom: 10px; left: 10px;" href="{{ $project->web_url }}" class="btn btn-primary">View <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop

@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <li class="list-group-item">GitLab API Working on Background</li>
        <li class="list-group-item"><a href="https://www.gitlab.com/hasanalpzengin"><i class="fas fa-edit"></i> Manage with GitLab</a></li>
    </ul>
@stop