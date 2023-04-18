@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Skill</h2>

    <form method="post" action="/console/skills/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="skill_name">Skill Name:</label>
            <input type="text" name="skill_name" id="skill_name" value="{{old('skill_name')}}" required>
            
            @if ($errors->first('skill_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('skill_name')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="skill_desc">Skill Description:</label>
            <input type="text" name="skill_desc" id="skill_desc" value="{{old('skill_desc')}}">

            @if ($errors->first('skill_desc'))
                <br>
                <span class="w3-text-red">{{$errors->first('skill_desc')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="subjects">Subjects:</label>
            <input type="text" name="subjects" id="subjects" value="{{old('subjects')}}" required>

            @if ($errors->first('subjects'))
                <br>
                <span class="w3-text-red">{{$errors->first('subjects')}}</span>
            @endif
        </div>

        

        <div class="w3-margin-bottom">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id">
                <option></option>
                @foreach ($projects as $project)
                    <option value="{{$project->id}}"
                        {{$project->id == old('project_id') ? 'selected' : ''}}>
                        {{$project->title}}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('project_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('project_id')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Add Skill</button>

    </form>

    <a href="/console/skills/list">Back to skill List</a>

</section>

@endsection