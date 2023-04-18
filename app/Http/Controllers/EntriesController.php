<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Project;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntriesController extends Controller
{
    public function list()
    {
        return view('entries.list', [
            'entries' => Entry::all()
        ]);
    }
    public function addForm()
    {
        return view('entries.add', [
            'topics' => Topic::all(),
        ]);
    }

    public function add()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'learned_at' => 'required',
            'content' => 'required',
            'topics'=> 'nullable',

        ]);

        $project = new Entry();
        $project->title = $attributes['title'];
        $project->learned_at = $attributes['learned_at'];
        $project->content = $attributes['content'];
        $project->save();

        if(isset($attributes['topics']))
        {
            foreach($attributes['topics'] as $topic)
            {
                $project->entryTopics()->attach($topic);
            }        
        }

        return redirect('/console/entries/list')
            ->with('message', 'Entry has been added!');
    }
}
