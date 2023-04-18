<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SkillsController extends Controller
{
    public function list()
    {
        return view('skills.list', [
            'skills' => Skill::all()
        ]);
    }

    public function addForm()
    {
        return view('skills.add', [
            'projects' => Project::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'skill_name' => 'required',
            'skill_desc' => 'required',
            'subjects' => 'nullable',
            'project_id' => 'required',
        ]);

        $skill = new Skill();
        $skill->skill_name = $attributes['skill_name'];
        $skill->skill_desc = $attributes['skill_desc'];
        $skill->subjects = $attributes['subjects'];
        $skill->project_id = $attributes['project_id'];
        $skill->user_id = Auth::user()->id;
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skills has been added!');
    }

    public function editForm(Skill $skill)
    {
        return view('skills.edit', [
            'skill' => $skill,
            'projects' => Project::all(),
        ]);
    }

    public function edit(Skill $skill)
    {

        $attributes = request()->validate([
            'skill_name' => 'required',
            'skill_desc' => 'required',
            'subjects' => 'nullable',
            'project_id' => 'required',
        ]);

        $skill->skill_name = $attributes['skill_name'];
        $skill->skill_desc = $attributes['skill_desc'];
        $skill->subjects = $attributes['subjects'];
        $skill->project_id = $attributes['project_id'];
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'skill has been edited!');
    }

    public function delete(Skill $skill)
    {

        $skill->delete();
        
        return redirect('/console/skills/list')
            ->with('message', 'Skills has been deleted!');        
    }

    public function imageForm(Skill $skill)
    {
        return view('skills.image', [
            'skill' => $skill,
        ]);
    }

    public function image(Skill $skill)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($skill->image)
        {
            Storage::delete($skill->image);
        }
        
        $path = request()->file('image')->store('skills');

        $skill->image = $path;
        $skill->save();
        
        return redirect('/console/skills/list')
            ->with('message', 'Skills image has been edited!');
    }
}
