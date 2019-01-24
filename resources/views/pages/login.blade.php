@extends('layouts.simple')

@section('title','Login')

@section('content')

    <div class="container my-4">
    <fieldset class="m-4" style="height: 300px;">
        <legend class="text-center">Login</legend>
        @if(isset($error))
            <div id="error" class="alert alert-danger">{{ $error }}</div>
        @else
            <div id="error" class="alert alert-danger" style="display:none;"></div>
        @endif
    {!! Form::open(array('url'=>'/login', 'class'=>'form w-50 mx-auto')) !!}
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-username"><i class="fas fa-keyboard"></i></span>
            </div>
            <input name="username" type="text" class="form-control" id="username" placeholder="Username" aria-describedby="label-username" aria-label="Username">
        </div>

        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-password"><i class="fas fa-key"></i></span>
            </div>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password" aria-describedby="label-password" aria-label="Password">
        </div>
        <button type="submit" class="form-control btn btn-success">Sign-in</button>
    {!! Form::close() !!}
    </fieldset>
</div>

<script>
    $('#username').keypress(function(){
        if($('#error').length != 0 && $('#error').is(':visible')){
            $('#error').hide();
        }
    });

    $('#password').keypress(function(){
        if($('#error').length != 0 && $('#error').is(':visible')){
            $('#error').hide();
        }
    });

    $('form').submit((event)=>{
        if($('#username').val().length<3 || $('#password').val().length<3){
            $('#error').text('Username or Password has to be longer than 3 character');
            $('#error').show();
            event.preventDefault();
        }
    });
</script>
@stop