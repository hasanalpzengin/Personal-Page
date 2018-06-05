@foreach($content as $project)
<div class="card">
  <a class="card-header" href="projects/{{$project->id}}"> <h3> {{ $project->name }} </h3> </a>
  <p class="card-body"> {{ $project->text }} </p>
  <a class="cord-footer" href="$project->link"> Link </a>
</div>
@endforeach
