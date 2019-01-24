@extends('layouts.simple')

@section('title','Upload Resume')

@section('content')
    <div class="container-fluid">
        <h2 class="my-4">Upload Resume</h2>
        {!! Form::open(array('url'=>'/cv/upload', 'class'=>'form w-100 mt-5', 'files' => true)) !!}
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-resume">Resume</span>
            </div>
            <input name="resume" accept=".pdf" type="file" class="form-control w-50 ml-2" id="resume" aria-describedby="label-resume" aria-label="Upload Resume">
        </div>
        <button type="submit" class="btn btn-primary w-100">Update</button>
        {!! Form::close() !!}
    </div>
@stop