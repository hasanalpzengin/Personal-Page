@extends('layouts.admin_frame')

@section('content')
<div class="container w-50">
    <!-- COMMENT SECTION -->
    <form class="form" action="{{ url('control-panel/users/edit') }}/{{ $content['content']->id }}" method="post">
      <input type="hidden" value="{{ $content['content']->id }}" name="id">
      <h3 class="h3">Edit User</h3>
      <div class="form-group">
        <label for="username" class="sr-only">Username: </label>
        <input type="username" class="form-control" value="{{ $content['content']->username }}" placeholder="Enter Username" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">Password: </label>
        <input type="password" class="form-control" value="{{ $content['content']->password }}" placeholder="Enter Password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="mail" class="sr-only">Mail: </label>
        <input type="mail" class="form-control" value="{{ $content['content']->mail }}" placeholder="Enter Mail" id="mail" name="mail" required>
      </div>
      <div class="form-group">
        <label for="name" class="sr-only">Name-Surname: </label>
        <input type="name" class="form-control" value="{{ $content['content']->name }}" placeholder="Enter Name-Surname" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="permission" class="sr-only">Permission Level 0-9: </label>
        <input type="permission" class="form-control" value="{{ $content['content']->permission }}" placeholder="Enter Permission Level 0-9" id="permission" name="permission" required>
      </div>
      @csrf
      <button type="submit" class="btn btn-primary">Submit <i class="fas fa-cloud-upload-alt"></i></button>
    </form>
</div>
@endsection
