@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit skill</h2>

    <form method="post" action="/console/skills/edit/{{$skill->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="skill_name">Skills:</label>
            <input type="skill_name" name="skill_name" id="skill_name" value="{{old('skill_name', $skill->skill_name)}}" required>
            
            @if ($errors->first('skill_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('skill_name')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="skill_desc">Skill Description:</label>
            <input type="skill_desc" name="skill_desc" id="skill_desc" value="{{old('skill_desc', $skill->skill_desc)}}">

            @if ($errors->first('skill_desc'))
                <br>
                <span class="w3-text-red">{{$errors->first('skill_desc')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="subjects">Subjects:</label>
            <input type="subjects" name="subjects" id="subjects" value="{{old('subjects', $skill->subjects)}}" required>

            @if ($errors->first('subjects'))
                <br>
                <span class="w3-text-red">{{$errors->first('subjects')}}</span>
            @endif
        </div>

        

        <div class="w3-margin-bottom">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id">
                <option></option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}"
                        {{$project->id == old('project_id', $skill->project_id) ? 'selected' : ''}}>
                        {{$project->title}}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('project_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('project_id')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit skill</button>

    </form>

    <a href="/console/projects/list">Back to Project List</a>

</section>

@endsection
