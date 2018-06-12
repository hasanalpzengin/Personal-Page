@foreach($content['list'] as $post)
<tr scope="row">
  <th>{{ $post->id }}</th>
  <td>{{ $post->name }}</td>
  <td>{{ $post->text }}</td>
  <td>{{ $post->link }}</td>
  <td>{{ $post->date }}</td>
  <td><a class="btn btn-primary" href="/control-panel/projects/edit/{{ $post->id }}">Edit</a></td>
  <td><a class="btn btn-primary" href="/control-panel/projects/delete/{{ $post->id }}">Delete</a></td>
</tr>
@endforeach
