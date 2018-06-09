@extends('layouts.main_frame')

@section('content')
@if(isset($content))
<div class="container">
  <h4 class="float-right">Last Update: {{$resume->date}}</h4>
  <object data='{{$resume->filename}}' type="application/pdf" width="80%" height="800px">
    <a href="{{$resume->filename}}" class="btn btn-primary"><p>Click Here to Download PDF File</p></a>
  </object>
</div>
@else
  @include('components.empty')
@endif

@endsection
