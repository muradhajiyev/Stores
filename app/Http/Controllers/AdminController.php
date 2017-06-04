<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class AdminController extends Controller
{
   public function index(Request $request){
      return view('admin.master');
   }
   public function categories(){
      $categories = Category::all();
      return view('admin.categories')->withCategories($categories);
   }
}
