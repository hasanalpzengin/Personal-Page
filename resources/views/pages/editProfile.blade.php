@extends('layouts.simple')

@section('title','Edit Profile')

@section('content')
    <div class="container-fluid">
        <h2 class="my-4">Edit Profile</h2>
        {!! Form::open(array('url'=>'/profile/edit', 'class'=>'form w-100 mt-5', 'files' => true)) !!}
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-username">Username</span>
            </div>
            <input name="username" type="text" class="form-control" id="username" value="{{$user->username}}" placeholder="Username" aria-describedby="label-username" aria-label="Username">
            <div class="invalid-feedback" id="username-invalid">Username has to be longer</div>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-password">Password</span>
            </div>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password" aria-describedby="label-password" aria-label="Password">
            <div class="invalid-feedback" id="password-invalid">Password has to be longer</div>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-name">Name</span>
            </div>
            <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{$user->name}}" aria-describedby="label-name" aria-label="Name">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-surname">Surname</span>
            </div>
            <input name="surname" type="text" class="form-control" id="surname" placeholder="Surname" value="{{$user->surname}}" aria-describedby="label-surname" aria-label="Surname">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-gender">Gender</span>
            </div>
            <select name="gender" class="form-control">
                @if($user->gender == 'O')
                <option value="O" selected>Other</option>
                <option value="F">Female</option>
                <option value="M">Male</option>
                @elseif($user->gender == 'F')
                <option value="O">Other</option>
                <option value="F" selected>Female</option>
                <option value="M">Male</option>
                @else
                <option value="O">Other</option>
                <option value="F">Female</option>
                <option value="M" selected>Male</option>
                @endif
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-email">E-Mail</span>
            </div>
            <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail" value="{{$user->email}}" aria-describedby="label-email" aria-label="email">
            <div class="invalid-feedback" id="email-invalid">E-mail is not entered properly</div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Update</button>
        {!! Form::close() !!}
    </div>

    <script>
        $('#username').keypress(function(){
            if($('#username').val().length>=3){
                $('#username-invalid').hide();
                $('#username').removeClass('is-invalid');
            }
        });

        $('#password').keypress(function(){
            if($('#password').val().length>=3){
                $('#password-invalid').hide();
                $('#password').removeClass('is-invalid');
            }
        });

        $('#email').keypress(function(){
            if(isEmail($('#email').val())){
                $('#email-invalid').hide();
                $('#email').removeClass('is-invalid');
            }
        });

        $('form').submit((event)=>{
            if($('#username').val().length<3){
                $('#username-invalid').show();
                $('#username').addClass('is-invalid');
                event.preventDefault();
            }
            if($('#password').val().length<3){
                $('#password-invalid').show();
                $('#password').addClass('is-invalid');
                event.preventDefault();
            }
            if(!isEmail($('#email').val())){
                $('#email-invalid').show();
                $('#email').addClass('is-invalid');
                event.preventDefault();
            }
        });

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
    </script>
@stop