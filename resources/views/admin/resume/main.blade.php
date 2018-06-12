@extends('layouts.admin_frame')

@section('content')
<div class="container">
    <!-- COMMENT SECTION -->
    @if(isset($content[0]))
    <h4 class="float-right">Last Update: {{$content[0]->date}}</h4>
    <embed src="{!! asset('/storage/'.$content[0]->filename) !!}" width="100%" height="800px">
      <a href="{!! asset('/storage/'.$content[0]->filename) !!}" class="btn btn-primary w-100 mb-2"><p>Click Here to Download PDF File</p></a>
    </embed>
    @else
      @include('components.empty')
    @endif
</div>
@endsection
