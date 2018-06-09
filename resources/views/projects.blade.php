@extends('layouts.main_frame')

@section('content')
<div class="container">
  @if(count($content)>0)
    @include('components.project')
  @else
    @include('components.empty')
  @endif
</div>
@endsection
