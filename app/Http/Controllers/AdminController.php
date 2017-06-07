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




   // public function categories(){
   //    $categories = Category::all();
   //    return json_encode($categories);
   //    // return view('admin.categories')->withCategories($categories);
   // }

   // public function getSubcategoriesByParentID($parent_id = 2) {
   //      $categories = array();
   //    // $users = DB::table('users')->select('name', 'email as user_email')->get();
   //    // $result = Category::find(Category::raw('id, parent_id, name'))
   //    // $orders = DB::select('select json_agg(data.*) from getOrders(?,?) as data', array(5,6));
   //
   //      $result = DB::table('categories')->select('*')
   //          ->where('parent_id', $parent_id)
   //          ->orderBy('parent_id')
   //          ->get();
   //
   //      foreach ($result as $mainCategory) {
   //          $category = array();
   //          $category['id'] = $mainCategory->id;
   //          $category['name'] = $mainCategory->name;
   //          $category['parent_id'] = $mainCategory->parent_id;
   //          // $category['sub_categories'] = $this->getTree($category['id']);
   //          $categories[$mainCategory->id] = $category;
   //      }
   //      return $categories;
   //  }
   //


}
