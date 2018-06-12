@extends('layouts.admin_frame')

@section('content')
<div class="container w-50">
    <!-- COMMENT SECTION -->
    <form class="form" action="{{ url('control-panel/projects/edit') }}/{{ $content['content']->id }}" method="post">
      <input type="hidden" value="{{ $content['content']->id }}" name="id">
      <h3 class="h3">Edit Project</h3>
      <div class="form-group">
        <label for="name" class="sr-only">Name: </label>
        <input type="name" class="form-control" value="{{ $content['content']->name }}" placeholder="Enter Name" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="text" class="sr-only">Text: </label>
        <textarea class="form-control" rows="5" placeholder="Enter Text" id="text" name="text" required>{{ $content['content']->text }}</textarea>
      </div>
      <div class="form-group">
        <label for="link" class="sr-only">Link: </label>
        <input type="link" class="form-control" value="{{ $content['content']->link }}" placeholder="Enter Link" id="link" name="link" required>
      </div>
      @csrf
      <button type="submit" class="btn btn-primary">Submit <i class="fas fa-cloud-upload-alt"></i></button>
    </form>
</div>
@endsection
