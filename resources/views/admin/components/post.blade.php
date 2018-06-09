@foreach($content['list'] as $post)
<tr scope="row">
  <th>{{ $post->id }}</th>
  <td>{{ $post->title }}</td>
  <td>{{ $post->author_id }}</td>
  <td>{{ $post->text }}</td>
  <td>{{ $post->date }}</td>
  <td><a class="btn btn-primary" href="/control-panel/posts/edit/{{ $post->id }}">Edit</a></td>
  <td><a class="btn btn-primary" href="/control-panel/posts/delete/{{ $post->id }}">Delete</a></td>
</tr>
@endforeach
