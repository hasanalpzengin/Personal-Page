@extends('layouts.simple')

@section('title','New Blogs')

@section('external_resources')
    <script src="/js/ckeditor.js"></script>
    <style>
        .ck.ck-editor {
            width: 100%;
        }

        .ck-editor__editable {
            min-height: 400px;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <h2 class="my-4">New Blog</h2>
        {!! Form::open(array('url'=>'/blogs/new', 'class'=>'form w-100 mt-5', 'files' => true)) !!}
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-title">Title</span>
            </div>
            <input name="title" type="text" class="form-control" id="title" placeholder="Title" aria-describedby="label-title" aria-label="Title">
            <div class="invalid-feedback" id="title-invalid">Title can't be shorter than 3 character</div>
        </div>
        <div class="input-group mb-2">
            <textarea id="editor" name="text" aria-label="Text" class="form-control w-100" rows="3" placeholder="Enter text for this blog"></textarea>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-visiblity">Visibility</span>
            </div>
            <input name="visibility" type="checkbox" class="ml-2" id="visibility" aria-describedby="label-visibility" aria-label="Visibility" checked>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-image">Cover Image</span>
            </div>
            <input name="image" accept=".png, .jpg, .jpeg" type="file" class="form-control-file w-50 ml-2" id="image" aria-describedby="label-image" aria-label="Image">
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