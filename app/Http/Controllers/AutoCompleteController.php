<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Post;

class AutoCompleteController extends Controller

{

    public function index()

    {

        return view('search');

    }

    public function ajaxData(Request $request){

        $query = $request->get('query','');

        $posts = Category::where('name','LIKE','%'.$query.'%')->get();

        return response()->json($posts);

    }

}