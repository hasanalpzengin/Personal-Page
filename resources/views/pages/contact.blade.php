@extends('layouts.simple')

@section('external_resources')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <script src="{{ asset('js/contact.js') }}"></script>
@stop

@section('title','Contact')

@section('content')

<h2 class="mt-4"><span><i class="fas fa-envelope"></i></span> Contact</h2>

<div class="wrapper">
    <div class="container w-autu mx-auto mt-4">
        <ul class="list-group contact-info">
            <li class="list-group-item"><b>Contact Info:</b></li>
            <li class="list-group-item"><i class="fab fa-github"></i> Github: <a href="https://github.com/hasanalpzengin">github.com/hasanalpzengin</a></li>
            <li class="list-group-item"><i class="fab fa-gitlab"></i> Gitlab: <a href="https://gitlab.com/hasanalpzengin">gitlab.com/hasanalpzengin</a></li>
            <li class="list-group-item"><i class="fab fa-linkedin-in"></i> Linkedin: <a href="https://linkedin.com/in/hasan-alp-zengin" >linkedin.com/in/hasan-alp-zengin</a></li>
            <li class="list-group-item"><i class="fas fa-at"></i> Mail: hasalp38[at]gmail.com</li>
        </ul>
    </div><br>
    <div class="container contact-form">
        <div class="contact-image">
            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
        </div>
        <form method="post" action="/mail">
            <h3>Drop Me a Message</h3>
            {{ csrf_field() }}
            <div class="row my-2 d-block">
                @if(session('success'))
                    <div id="success" class="alert alert-success w-100">Mail Sending Success</div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="txtName" class="form-control" placeholder="Your Name *">
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *">
                    </div>
                    <div class="form-group">
                        <input type="text" name="photxtPhonene" class="form-control" placeholder="Your Phone Number">
                    </div>
                    <div class="form-group">
                        <button name="btnSubmit" class="btnContact">Send Message</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                    </div>
                </div>
            </div>
            <small class="float-right">Thanks to kshiti06</small>
        </form>
    </div>
</div>
@stop

@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
@stop