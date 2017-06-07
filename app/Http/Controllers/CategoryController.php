<?php
/**
 * Created by PhpStorm.
 * User: Gadir
 * Date: 6/7/2017
 * Time: 10:37 AM
 */

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth','adminOrStore']);
    }
    public function manageCategory()
    {
        $categories = Category::where('parent_id', null)->get();
        //$allCategories = Category::pluck('name','id')->all();
        return view('admin.categories.index', compact('categories'));
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
}