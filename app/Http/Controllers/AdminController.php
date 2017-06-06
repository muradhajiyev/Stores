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

   public function manageCategory()
   {
      $categories = Category::where('parent_id', null)->get();
      //$allCategories = Category::pluck('name','id')->all();
      return view('admin.categories', compact('categories'));
   }

   /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
   public function addCategory(Request $request)
   {
      $this->validate($request, [
         'name' => 'required',
      ]);
      $input = $request->all();
      $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

      Category::create($input);
      return back()->with('success', 'New Category added successfully.');
   }

   public function downloadMainCategories() {
      $result = DB::table('categories')->select('*')
          ->where('parent_id', null)
          ->orderBy('id')
          ->get();
       return $result;
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
