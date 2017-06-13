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
      $dir = config('settings.product_base_path') . "/" .date("Y-m-d");
      //if isCover is set, then the image is Cover photo of store
      if(isset($request->isCover)){
       if($request->isCover =="1"){
          $dir = config('settings.store_base_path') . "/" . date("Y-m-d");
       }
     }
       $image = new Image();
       $path = $request->file('file')->store($dir);
       $image->file_name = substr($path,strlen($dir) + 1);
       $image->extension = $request->file->extension();
       $image->file_size = filesize($request->file);
       $image->path = $path;
       $image->save();
       $imgId = $image->id;
       return response()->json($imgId, 200);
       // return response()->json('error', 400);
   }
}
