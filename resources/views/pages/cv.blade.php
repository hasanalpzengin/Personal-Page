@extends('layouts.simple')

@section('title','CV')

@section('content')
    <div class="mx-auto my-4">
        <h2><span><i class="fas fa-file"></i></span> Resume</h2>
        <iframe id="pdfviewer" style="height: 600px;" src="https://docs.google.com/gview?url={{ asset('documents/cv.pdf') }}&amp;embedded=true" frameborder="0" width="100%" height="100%"></iframe>
    </div>
@stop

@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <li class="list-group-item"><a href="/cv/upload"><i class="fas fa-edit"></i> Post New PDF</a></li>
    </ul>
@stop