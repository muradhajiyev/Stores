<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    //
   public function upload(Request $request){

       $this->validate($request, [
           'file' => 'image|mimes:jpeg,jpg,bmp,png|max:4000',
       ]);
       $image = new Image();
       $path = $request->file('file')->store('images');
       $image->file_name = substr($path,7);
       $image->extension = $request->file->extension();
       $image->file_size = filesize($request->file);
       $image->path = $path;
       $image->save();
       $imgId = $image->id;
       return response()->json($imgId, 200);
       // return response()->json('error', 400);
   }
}
