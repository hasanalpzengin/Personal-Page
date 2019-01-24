@extends('layouts.simple')

@section('title','Skills')

@section('content')
    <div class="mx-auto my-4">
        <h2>Skills</h2>
        <p>Click on the skill category to open and close it.</p>
        <div class="panel-group">
            @foreach($categories as $category)
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse{{$category->id}}">{{$category->name}}</a>
                    </h4>
                </div>
                <div id="collapse{{$category->id}}" class="panel-collapse collapse">
                    <ul class="list-group">
                        @foreach($skills as $skill)
                            @if($skill->category == $category->id)
                                <li class="list-group-item">{{ $skill->name }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop

@section('admin-panel')
    <ul class="list-group m-0 p-0">
        <li class="list-group-item"><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <li class="list-group-item"><a href="/skills/new"><i class="far fa-plus-square"></i> Create Skill</a></li>
        <li class="list-group-item"><a href="/categories/new"><i class="far fa-plus-square"></i> Create Category</a></li>
        <li class="list-group-item"><a id="toggle-delete" style="cursor: pointer;"><i class="fas fa-trash-alt"></i> Delete Skill</a></li>
        <li class="list-group-item" style="display: none;" id="delete-field">Name of Skill: <input type="text" class="w-100" id="delete"><button class="btn btn-danger w-100 mt-2" id="delete-skill"><i class="fas fa-trash-alt"></i></button></li>
    </ul>

    <script>
        $('#toggle-delete').click(()=>{
            $('#delete-field').slideToggle();
        });

        $('#delete-skill').click(()=>{
            let skill_name = $('#delete').val();

            if(skill_name.length>0){
                $.post('/skills/delete', {
                    name: skill_name,
                    _token: '{{ csrf_token() }}',
                }).done((response)=>{
                    location.reload();
                });
            }
        });
        
    </script>
@stop