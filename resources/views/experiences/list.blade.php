@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Experiences</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            
            <th>Company Name</th>
            <th>Designation</th>
            <th>Experince from</th>
            <th>Experince to</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($experiences as $experience)
            <tr>
                
                
                <td>
                    <a href="/experience/{{$experience->company_name}}">
                        {{$experience->company_name}}
                    </a>
                </td>
                <td>{{$experience->designation}}</td>
                <td>{{$experience->experience_from}}</td>
                <td>{{$experience->experience_to}}</td>

                <td><a href="/console/experiences/edit/{{$experience->id}}">Edit</a></td>
                <td><a href="/console/experiences/delete/{{$experience->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/experiences/add" class="w3-button w3-green">New Experience</a>

</section>

@endsection
