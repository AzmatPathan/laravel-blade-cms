@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit experience</h2>

    <form method="post" action="/console/experiences/edit/{{$experience->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="company_name">Company Name:</label>
            <input type="company_name" name="company_name" id="company_name" value="{{old('company_name', $experience->company_name)}}" required>
            
            
            @if ($errors->first('company_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('company_name')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="designation">Designation:</label>
            <input type="designation" name="designation" id="designation" value="{{old('designation', $experience->designation)}}">

            @if ($errors->first('designation'))
                <br>
                <span class="w3-text-red">{{$errors->first('designation')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="experience_from">Experience From:</label>
            <input type="date" name="experience_from" id="experience_from" value="{{old('experience_from', $experience->experience_from)}}" required>

            @if ($errors->first('experience_from'))
                <br>
                <span class="w3-text-red">{{$errors->first('experience_from')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="experience_to">Experience To:</label>
            <input type="date" name="experience_to" id="experience_to" value="{{old('experience_to', $experience->experience_to)}}" required>

            @if ($errors->first('experience_to'))
                <br>
                <span class="w3-text-red">{{$errors->first('experience_to')}}</span>
            @endif
        </div>


        <div class="w3-margin-bottom">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id">
                <option></option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}"
                        {{$project->id == old('project_id', $experience->project_id) ? 'selected' : ''}}>
                        {{$project->title}}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('project_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('project_id')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit experience</button>

    </form>

    <a href="/console/experiences/list">Back to experience List</a>

</section>

@endsection
