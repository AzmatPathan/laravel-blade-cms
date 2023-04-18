<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;


class TopicsController extends Controller
{
    public function list()
    {
        return view('topics.list', [
            'topics' => Topic::all()
        ]);
    }
}
