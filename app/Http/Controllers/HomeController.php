<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Store;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function show(Request $request)
    {
        $subCategories = '';
        $id = $request->input('id');
        $name = $request->input('category_name');
        $storeName = $request->input('searchStoreName');
        if (!is_null($id)) {
            $subCategories = $this->getChildCategories($id);
            $categories = Category::where('parent_id', $id)->pluck('id')->toArray();
            array_push($categories, $id);
            $products = Product::whereIn('category_id', $categories)->pluck('store_id')->toArray();
            if (is_null($storeName)) {
                $stores = Store::whereIn('id', $products)->paginate(12);
            }else{
                $stores = Store::whereIn('id', $products)->where('name', $storeName)->paginate(12);
            }
        } else {
            if (is_null($storeName)) {
                $stores = Store::orderBy('created_at', 'desc')->paginate(12);
            }else{
                $stores = Store::where('name', $storeName)->orderBy('created_at', 'desc')->paginate(12);
            }
        }
        return view('home.index')->with('stores', $stores)->with('categoryName', $name)->with('subCategories',$subCategories);
    }
    public function getChildCategories($id){
        $parent_id = Category::find($id);
        if (!is_null($parent_id->parent_id)) {
            $childCategories = Category::where('parent_id', $parent_id->parent_id)->get();
        }else{
            $childCategories = null;

        }
        return $childCategories;
    }

    public function profile(Request $request){
        $subCategories = '';
        $id = $request->input('store_id');
        $searchProduct = $request->input('searchStoreName');
        $category_id = $request->input('id');
        $store = Store::find($id);
        if (!is_null($category_id)) {
            $subCategories = $this->getChildCategories($category_id);
            if (is_null($searchProduct)) {
                $store->setRelation('products', $store->products()->where('category_id', $category_id)->paginate(10));
            }else{
                $store->setRelation('products', $store->products()->where('category_id', $category_id)->where('name', 'like', '%' . $searchProduct . '%')->paginate(10));
            }
        }else {
            if (is_null($searchProduct)) {
                $store->setRelation('products', $store->products()->paginate(10));

            } else {
                $store->setRelation('products', $store->products()->where('name', 'like', '%' . $searchProduct . '%')->paginate(10));
            }
        }
        return view('store.index', ['store' => $store])->with('subCategories',$subCategories);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home');
    }

    public function autoComplete(Request $request)
    {
        $term = $request->term;

        $results = array();

        $queries = DB::table('brands')
            ->where('name', 'LIKE', '%' . $term . '%')
            ->take(6)->get();

        foreach ($queries as $query) {
            $results[] = ['id' => $query->id, 'value' => $query->name];
        }
        return response()->json($results);
    }
}
