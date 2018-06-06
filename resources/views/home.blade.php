@extends('layouts.main_frame')

@section('content')
<div class="container">
  @if(isset($content['result']['status']))
    @if($content['result']['status']=='success')
      <div class="alert alert-success">{{ $content['result']['message'] }}</div>
    @else
      <div class="alert alert-danger">{{ $content['result']['message'] }}</div>
    @endif
  @endif
  <!-- COMMENT DIVISION -->
  <ul class="wrapper list-unstyled mt-2">
    <!-- COMMENT SECTION -->
    @if(count($content['posts'])>0)
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
