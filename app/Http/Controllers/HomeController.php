<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Store;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show(){
        $stores = Store::orderBy('created_at', 'desc')->paginate(12); 
        return view('home.index', ['stores'=>$stores]);
    }
    public function showSpecificStores($name,$id)
    {
        $categories = Category::where('parent_id', $id)->pluck('id')->toArray();
        array_push($categories,$id);
        $products = Product::whereIn('category_id',$categories)->pluck('store_id')->toArray();
        $stores = Store::whereIn('id', $products)->paginate(12);
        return view('home.index')->with('stores', $stores)->with('categoryName', $name);

    }

    public function profile($id){
       $store = Store::find($id);

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
}
