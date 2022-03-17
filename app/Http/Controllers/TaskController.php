<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $milestone_id = $request['id'];
        return $tasks = Task::where('milestone_id',$milestone_id);
    }
    public function save(Request $request)
    {
        return Task::create($request->all());
    }
}
