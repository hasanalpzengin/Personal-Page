@extends('layouts.simple')

@section('title','Edit User')

@section('external_resources')
@stop

@section('content')
    <div class="container">
        <h2 class="my-4">Edit User</h2>
        {!! Form::open(array('url'=>'/users/edit/$user->id', 'class'=>'form w-100 mt-5')) !!}
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-username">Username</span>
            </div>
            <input name="username" value="{{$user->username}}" type="text" class="form-control" id="username" placeholder="Username" aria-describedby="label-username" aria-label="Username">
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
            <input name="name" type="text" value="{{$user->name}}" class="form-control" id="name" placeholder="Name" aria-describedby="label-name" aria-label="Name">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-surname">Surname</span>
            </div>
            <input name="surname" type="text" value="{{$user->surname}}" class="form-control" id="surname" placeholder="Surname" aria-describedby="label-surname" aria-label="Surname">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-gender">Gender</span>
            </div>
            <select name="gender" class="form-control" aria-label="Gender" aria-describedby="label-gender">
            @if($user->gender=='F')
                <option value="M">Male</option>
                <option value="F" selected>Female</option>
                <option value="O">Other</option>
            @elseif($user->gender=='O')
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O" selected>Other</option>
            @else
                <option value="M" selected>Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
            @endif
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-email">E-mail</span>
            </div>
            <input name="email" type="text" value="{{$user->email}}" class="form-control" id="email" placeholder="E-Mail" aria-describedby="label-email" aria-label="Email">
            <div class="invalid-feedback" id="email-invalid">E-mail is not entered properly</div>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text" id="label-permission">Permission</span>
            </div>
            <select name="permission" class="form-control" aria-label="Permission" aria-describedby="label-permission">
                @if($user->gender==5)
                <option value="5" selected>Simple</option>
                <option value="6">Editor</option>
                <option value="7">Admin</option>
                <option value="9">Owner</option>
                @elseif($user->gender==6)
                <option value="5">Simple</option>
                <option value="6" selected>Editor</option>
                <option value="7">Admin</option>
                <option value="9">Owner</option>
                @elseif($user->gender==7)
                <option value="5">Simple</option>
                <option value="6">Editor</option>
                <option value="7" selected>Admin</option>
                <option value="9">Owner</option>
                @else
                <option value="5">Simple</option>
                <option value="6">Editor</option>
                <option value="7">Admin</option>
                <option value="9" selected>Owner</option>
                @endif
            </select>
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