@extends('layouts.main_frame')

@section('content')
<div class="container">
  <ul class="wrapper list-unstyled mt-2">
    <li class="media p-2 border border-primary">
      <img class="mr-3 align-self-center" width="64px" height="64px" src="{!! asset("image/message.png") !!}"/>
      <div class="media-body">
        <h5 class="mt-0">Webpage Renewed</h5>
        <hr>
        <p>I recreated my webpage with laravel and bootstrap</p>
      </div>
    </li>
  </ul>
</div>
@endsection
