<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    //
    public function show(Request $request)
    {
        $project_id = $request['id'];
        return $milestones = Milestone::where('project_id', $project_id)
        ->with(['tasks'])
        ->get();
    }

}
