@extends('layouts.simple')

@section('title','New Skill')

@section('content')
    <div class="container-fluid">
        <h2 class="my-4">New Skill</h2>
        {!! Form::open(array('url'=>'/skills/new', 'class'=>'form w-50 mt-5')) !!}
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-skill-name">Skill Name</span>
            </div>
            <input name="name" type="text" class="form-control" id="name" placeholder="Skill Name" aria-describedby="label-skill-name" aria-label="Skill Name">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-category">Category</span>
            </div>
            <select name="category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Create</button>
        {!! Form::close() !!}
    </div>
@stop