<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','adminOrStore']);
    }

   public function index(Request $request){
      return view('admin.master');
   }
}
