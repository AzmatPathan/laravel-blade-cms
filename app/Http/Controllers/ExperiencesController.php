<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperiencesController extends Controller
{
    public function list()
    {
        return view('experiences.list', [
            'experiences' => Experience::all()
        ]);
    }

    public function addForm()
    {
        return view('experiences.add', [
            'projects' => Project::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'company_name'=> 'required' ,
            'designation' => 'required',
            'experience_from' => 'required',
            'experience_to' => 'required',
            'project_id' => 'required'
        ]);

        $experience = new Experience();
        $experience->company_name = $attributes['company_name'];
        $experience->designation = $attributes['designation'];
        $experience->experience_from = $attributes['experience_from'];
        $experience->experience_to = $attributes['experience_to'];
        $experience->project_id = $attributes['project_id'];
        $experience->save();

        return redirect('/console/experiences/list')
            ->with('message', 'experience has been added!');
    }

    public function editForm(Experience $experience)
    {
        return view('experiences.edit', [
            'experience' => $experience,
            'projects' => Project::all(),

        ]);
    }

    public function edit(Experience $experience)
    {

        $attributes = request()->validate([
            'company_name'=> 'required' ,
            'designation' => 'required',
            'experience_from' => 'required',
            'experience_to' => 'required',
            'project_id' => 'required'
        ]);

        $experience->company_name = $attributes['company_name'];
        $experience->designation = $attributes['designation'];
        $experience->experience_from = $attributes['experience_from'];
        $experience->experience_to = $attributes['experience_to'];
        $experience->project_id = $attributes['project_id'];
        $experience->save();

        return redirect('/console/experiences/list')
            ->with('message', 'experience has been edited!');
    }

    public function delete(Experience $experience)
    {

        $experience->delete();
        
        return redirect('/console/experiences/list')
            ->with('message', 'experience has been deleted!');        
    }

}
