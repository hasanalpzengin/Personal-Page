@extends('layouts.admin_frame')

@section('content')
<div class="container">
    <!-- COMMENT SECTION -->
    @if(isset($content['list']) and count($content['list'])>0)
    <table class="table table-stripe">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Text</th>
          <th scope="col">Link</th>
          <th scope="col">Date</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @include('admin.project.components.project')
      </tbody>
    </table>
    @else
      @include('components.empty')
    @endif
</div>
@endsection
