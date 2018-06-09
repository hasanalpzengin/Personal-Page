@extends('layouts.admin_frame')

@section('content')
<div class="container">
    <!-- COMMENT SECTION -->
    @if(count($content['list'])>0)
    <table class="table table-stripe">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Mail</th>
          <th scope="col">Name</th>
          <th scope="col">Create Date</th>
          <th scope="col">Permission</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @include('admin.components.user')
      </tbody>
    </table>
    @else
      @include('components.empty')
    @endif
</div>
@endsection
