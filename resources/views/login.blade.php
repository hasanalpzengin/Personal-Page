@extends('layouts.main_frame')

@section('content')
<div class="container w-25">
  <form class="form align-self-center" method="post" action="{{url('login')}}">
    <div class="row form-group">
      <label for="uname"><b>Username:</b></label>
      <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>
    </div>
    <div class="row form-group">
      <label for="pwd"><b>Password:</b></label>
      <input type="password" class="form-control" placeholder="Enter Password" name="pwd" required>
    </div>
    <div class="row form-group">
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
</div>
@endsection
