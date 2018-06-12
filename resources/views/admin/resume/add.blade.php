@extends('layouts.admin_frame')

@section('content')
<div class="container w-50">
    <!-- COMMENT SECTION -->
    <form class="form" action="{{ url('control-panel/resume/add') }}" method="post" enctype="multipart/form-data">
      <h3 class="h3">Add Resume</h3>
      <div class="form-group">
        <input type="file" class="form-control-file border" name="resume" required>
      </div>
      @csrf
      <button type="submit" class="btn btn-primary">Submit <i class="fas fa-cloud-upload-alt"></i></button>
    </form>
</div>
@endsection
