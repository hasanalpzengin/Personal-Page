@extends('layouts.main_frame')

@section('content')
<div class="container w-50">
  <ul class="wrapper list-unstyled mt-2">
    <li class="media p-2 border border-primary rounded mt-2">
      <i class="fas fa-at display-3 align-self-center pr-4"></i>
      <div class="media-body">
        <h5 class="mt-0">E-Mail</h5>
        <hr>
        <p><code>hasalp38[at]gmail.com</code></p>
      </div>
    </li>
    <li class="media p-2 border border-primary rounded mt-2 pl-4">
      <div class="media-body">
        <h5 class="mt-0">Linkedin</h5>
        <hr>
        <p><a href="https://www.linkedin.com/in/hasan-alp-zengin-15bb43147/" class="btn btn-primary">https://www.linkedin.com/in/hasan-alp-zengin-15bb43147/</a></p>
      </div>
      <i class="fab fa-linkedin display-3 align-self-center"></i>
    </li>
    <li class="media p-2 border border-primary rounded mt-2">
      <i class="fab fa-github display-3 align-self-center pr-4"></i>
      <div class="media-body">
        <h5 class="mt-0">Github</h5>
        <hr>
        <p><a href="https://github.com/hasanalpzengin" class="btn btn-primary">github.com/hasanalpzengin</a></p>
      </div>
    </li>
  </ul>
</div>
@endsection
