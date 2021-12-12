<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class TeacherController extends Controller
{
    //
    public function index()
    {
        // return DataTables::of(Teacher::select('id','name','address','year','grade'))->make(true);
        // return DataTables::of(Teacher::select('id','name','address','age','title','number_of_courses','salary'))
        // ->make(true);

        $model = Teacher::query();
        return DataTables::eloquent($model)
        ->addColumn('operations',function($model){
            $router = 'check';
            $form = '                                    
                <button data-id="'.$model->id.'"  type="button" class="btn-icon edit_teacher"><i class="far fa-edit icon-primary"></i></button>
                /
                <button data-id="'.$model->id.'" type="button" class="btn-icon delete_teacher"><i class="far fa-trash-alt icon-danger"></i></button>                            
            ';

            return $form;
        })
        ->rawColumns(['operations'])           
        
        ->toJson();
    }

    public function store(Request $request)
    {  
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'title' => 'required|string|max:191',
            'age' => 'required|numeric|min:22|max:80',
            'number_of_courses' => 'required|numeric|min:1|max:5',
            'salary' => 'required|numeric|min:500|max:30000',
            'address' => 'required|string|min:10',
        ]);

        return Teacher::create([            
            'name' => $request['name'],
            'title' => $request['title'],
            'age' => $request['age'],
            'number_of_courses' => $request['number_of_courses'],
            'salary' => $request['salary'],
            'address'  => $request['address'],
        ]);
    }

    public function show(Request $request)
    {
        $teacher_id = $request['id'];
        return$teacher = Teacher::findOrFail($teacher_id);       
    }
}
