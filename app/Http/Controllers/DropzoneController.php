<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    function index()
    {
     return view('dropzone_2');
    }

    function upload(Request $request)
    {
     $image = $request->file('file');

    //  $imageName = time() . rand() . '.' . $image->extension();

     $ext = pathinfo($image, PATHINFO_EXTENSION);
     $imageName = time() . rand() . '.' . $ext;

     $image->move(public_path('attachments'), $imageName);

     return response()->json(['success' => $imageName]);
    }

    function fetch()
    {
     $attachments = \File::allFiles(public_path('attachments'));
     $output = '<div class="row">';
     foreach($attachments as $image)
     {
      $output .= '      
            <div class="col-xs-12 col-sm-6 col-md-3" style="margin-top:10px;">
                <div class="card" style="">
                    <a href="#">
                        <img src="'.asset('attachments/' . $image->getFilename()).'" class="card-img-top thumb_src"/>
                    </a>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary remove_image" id="'.$image->getFilename().'">Remove</button>
                    </div>
                </div>
            </div>
      ';
     }
     $output .= '</div>';
     echo $output;
    }

    function delete(Request $request)
    {
     if($request->get('name'))
     {
      \File::delete(public_path('attachments/' . $request->get('name')));
     }
    }
}
