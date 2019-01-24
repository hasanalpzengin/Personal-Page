@extends('layouts.simple')

@section('title','New Category')

@section('content')
    <div class="container-fluid">
        <h2 class="my-4">New Category</h2>
        {!! Form::open(array('url'=>'/categories/new', 'class'=>'form w-50 mt-5')) !!}
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-category-name">Category Name</span>
            </div>
            <input name="name" type="text" class="form-control" id="name" placeholder="Category Name" aria-describedby="label-category-name" aria-label="Category Name">
        </div>
        <button type="submit" class="btn btn-primary w-100">Create</button>
        {!! Form::close() !!}
    </div>
@stop