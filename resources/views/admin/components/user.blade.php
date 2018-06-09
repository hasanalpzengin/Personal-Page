@foreach($content['list'] as $post)
<tr scope="row">
  <th>{{ $post->id }}</th>
  <td>{{ $post->username }}</td>
  <td>{{ $post->mail }}</td>
  <td>{{ $post->name }}</td>
  <td>{{ $post->created_at }}</td>
  <td>{{ $post->permission }}</td>
  <td><a class="btn btn-primary" href="control-panel/posts/edit/{{ $post->id }}">Edit</a></td>
  <td><a class="btn btn-primary" href="control-panel/posts/delete/{{ $post->id }}">Delete</a></td>
</tr>
@endforeach
