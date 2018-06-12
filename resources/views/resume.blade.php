@extends('layouts.main_frame')

@section('content')
@if(isset($content))
<div class="container">
  <h4 class="float-right">Last Update: {{$content->date}}</h4>
  <object data='{{asset("storage")/$content->filename}}' type="application/pdf" width="80%" height="800px">
    <a href='{{asset("storage")/$content->filename}}' class="btn btn-primary"><p>Click Here to Download PDF File</p></a>
  </object>
</div>
@else
  @include('components.empty')
@endif

@endsection
