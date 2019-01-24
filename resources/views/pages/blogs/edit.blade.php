@extends('layouts.simple')

@section('title','New Blogs')

@section('content')
    <div class="container-fluid">
        <h2 class="my-4">New Blog</h2>
        {!! Form::open(array('url'=>'/blogs/edit', 'class'=>'form w-100 mt-5', 'files' => true)) !!}
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-title">Title</span>
            </div>
            <input name="title" type="text" class="form-control" id="title" value="{{$post->title}}" placeholder="Title" aria-describedby="label-title" aria-label="Title">
        </div>
        <div class="input-group mb-2">
            <textarea name="text" aria-label="Text" id="editor" class="form-control w-100" rows="3" placeholder="Enter text for this blog">{{$post->text}}</textarea>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-visiblity">Visibility</span>
            </div>
            @if($post->isVisible)
            <input name="visibility" type="checkbox" checked="{{$post->isVisible}}"  class="ml-2" id="visibility" aria-describedby="label-visibility" aria-label="Visibility" checked>
            @else
            <input name="visibility" type="checkbox" checked="{{$post->isVisible}}"  class="ml-2" id="visibility" aria-describedby="label-visibility" aria-label="Visibility">
            @endif
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-image">Cover Image</span>
            </div>
            <input name="image" value="{{$post->image_name}}" accept=".png, .jpg, .jpeg" type="file" class="form-control-file w-50 ml-2" id="image" aria-describedby="label-image" aria-label="Image">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-category">Category</span>
            </div>
            <select name="category">
                @foreach($categories as $category)
                @if($category->id!=$post->category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Update</button>
        {!! Form::close() !!}
    </div>

    <script>
        ClassicEditor.create(document.querySelector('#editor'),{
            removePlugins: ['image','imageUpload'],
            toolbar: [
                'heading',
                '|',
		        'bold',
		        'italic',
		        'link',
                'bulletedList',
                'numberedList',
                'insertTable',
                'mediaEmbed',
                'undo',
                'redo'
	        ]
        })
        .then(editor=>{
            window.editor = editor;
        })
        .catch(error=>{
            console.error(error);
        });

        $('#title').keypress(function(){
            if($('#title').val().length>=3){
                $('#title-invalid').hide();
                $('#title').removeClass('is-invalid');
            }
        });

        $('form').submit((event)=>{
            if($('#title').val().length<3){
                $('#title').addClass('is-invalid');
                $('#title-invalid').show();
                event.preventDefault();
            }
        });
    </script>

@stop