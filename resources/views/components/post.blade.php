@foreach($content['list'] as $post)
  <li class="media p-2 border border-primary mb-3">
    <img class="mr-3 align-self-center" width="64px" height="64px" src="{!! asset("image/message.png") !!}"/>
    <div class="media-body">
      <a href="home/{{ $post->id }}"><h5 class="mt-0">{{ $post->title }}</h5></a>
      <hr>
      <p>{{ $post->text }}</p>
    </div>
  </li>
@endforeach
