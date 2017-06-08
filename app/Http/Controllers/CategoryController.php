<?php

namespace App\Http\Controllers;


use App\Category_Specification;
use App\Specification;
use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware(['auth','adminOrStore']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', null)->get();
        return view('admin.categories.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Category();
        $specifications = new Category_Specification();
        $parentId = $request->parentId;
        $name = $request->categoryName;
        $specificationValues = $request->specificationValues;
        if($parentId>0) {
            $categories->parent_id = $parentId;
            $categories->name = $name;
        }else{
            $categories->name = $name;
        }
        $categories->save();
        $massInsert = [];
        for ($i = 0; $i < count($specificationValues); $i++) {
            $massInsert[] = ['categ_id' => $categories->id, 'spec_id' => $specificationValues[$i]];
        }
        Category_Specification::insert($massInsert);

        $category = Category::where('parent_id', null)->get();
        return view('admin.categories.index')->with('categories',$category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specifications = Specification::all();
        if ($id>0) {
            $categories = Category::find($id);
        }else{
             $categories = null;
        }
        return view('admin.categories.create')->with('categories',$categories)->with('specifications',$specifications);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();

        return redirect('/admin/categories');
    }


    public function getSubCategories($id)
    {
        $subCategories = Category::all()->where('parent_id', $id)->toJson();
        return $subCategories;
    }

    public function getSpecificationsByCategoryId($id){
        return Category::find($id)->specifications;
    }

}
