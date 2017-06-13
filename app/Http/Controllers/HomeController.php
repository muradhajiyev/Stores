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
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('category_name');
        $storeName = $request->input('searchStoreName');
        if (!is_null($id)) {
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
        return view('home.index')->with('stores', $stores)->with('categoryName', $name);
    }

    public function profile()
    {
        $store = Store::all();

        return view('store.index', ['store' => $store]);

        // $stores = Store::all(); 

        // return view('store.index', ['stores'=>$stores]);
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
