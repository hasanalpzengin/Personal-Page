@extends('layouts.admin_frame')

@section('content')
<div class="container w-50">
    <!-- COMMENT SECTION -->
    <form class="form" action="{{ url('control-panel/projects/add') }}" method="post">
      <h3 class="h3">Add Project</h3>
      <div class="form-group">
        <label for="name" class="sr-only">Name: </label>
        <input type="name" class="form-control" placeholder="Enter Name" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="text" class="sr-only">Text: </label>
        <textarea class="form-control" rows="5" placeholder="Enter Text" id="text" name="text" required></textarea>
      </div>
      <div class="form-group">
        <label for="link" class="sr-only">Link: </label>
        <input type="link" class="form-control" placeholder="Enter Link" id="link" name="link" required>
      </div>
      @csrf
      <button type="submit" class="btn btn-primary">Submit <i class="fas fa-cloud-upload-alt"></i></button>
    </form>
</div>
@endsection
