@extends('layouts.admin_frame')

@section('content')
<div class="container">
  <!-- COMMENT DIVISION -->
  <ul class="wrapper list-unstyled mt-2">
    <!-- COMMENT SECTION -->
    @if(count($content['list'])>0)
      @include('components.post')
    @else
      @include('components.empty')
    @endif
  </ul>
</div>

<style>
  .jumbotron{
    background: url('{!! asset("image/jumbotron_bg.png") !!}');
    color: #FFF;
  }
</style>
@endsection
