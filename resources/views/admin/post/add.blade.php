@extends('layouts.admin_frame')

@section('content')
<div class="container w-50">
    <!-- COMMENT SECTION -->
    <form class="form" action="{{ url('control-panel/posts/add') }}" method="post">
      <h3 class="h3">Add Post</h3>
      <div class="form-group">
        <label for="title" class="sr-only">Title: </label>
        <input type="title" class="form-control" placeholder="Enter Title" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="text" class="sr-only">Text: </label>
        <textarea class="form-control" rows="5" placeholder="Enter Text" id="text" name="text" required></textarea>
      </div>
      @csrf
      <button type="submit" class="btn btn-primary">Submit <i class="fas fa-cloud-upload-alt"></i></button>
    </form>
</div>
@endsection
