<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{

    public function index()
    {
        $model = Project::query();
        return DataTables::eloquent($model)
        ->addColumn('view',function($model){
            $form = '                                    
                <button data-id="'.$model->id.'"  type="button" class="btn-icon view_project"><i class="far fa-edit icon-primary"></i></button>
                /
                <button data-id="'.$model->id.'" type="button" class="btn-icon delete_project"><i class="far fa-trash-alt icon-danger"></i></button>                            
            ';

            return $form;
        })
        ->rawColumns(['view'])           
        ->toJson();
    }

    public function show(Request $request)
    {
        $project_id = $request['id'];
        return $project = Project::findOrFail($project_id);
    }
}
