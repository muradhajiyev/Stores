<?php

namespace App\Http\Controllers;

use App\Brand;
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
            } else {
                $storeName = strtolower($storeName);
                $stores = Store::whereIn('id', $products)->where(DB::raw('LOWER(name)'), 'LIKE', "%" . $storeName . "%")
                    ->orderBy('created_at', 'desc')->paginate(12);
            }
        } else {
            if (is_null($storeName)) {
                $stores = Store::orderBy('created_at', 'desc')->paginate(12);
            } else {
                $storeName = strtolower($storeName);
                $stores = Store::where(DB::raw('LOWER(name)'), 'LIKE', "%" . $storeName . "%")->orderBy('created_at', 'desc')->paginate(12);
            }
        }
        return view('home.index')->with('stores', $stores)->with('categoryName', $name)->with('subCategories', $subCategories);
    }

    public function getChildCategories($id)
    {
        $parent_id = Category::find($id);
        if (!is_null($parent_id->parent_id)) {
            $childCategories = Category::where('parent_id', $parent_id->parent_id)->get();
        } else {
            $childCategories = null;

        }
        return $childCategories;
    }

    public function profile(Request $request)
    {
        $subCategories = '';
        $id = $request->input('store_id');
        $searchProduct = $request->input('searchStoreName');
        $category_id = $request->input('id');
        $store = Store::find($id);
        $parentCategories = Category::all()->where('parent_id', null);
        $brands = Brand::all();
        $product = Product::where('store_id', $id)->orderBy('views', 'desc')->take(config('settings.max_most_viewed_product_count'))->get();
        if (!is_null($category_id)) {
            $subCategories = $this->getChildCategories($category_id);
            if (is_null($searchProduct)) {
                $store->setRelation('products', $store->products()->where('category_id', $category_id)->paginate(10));
            } else {
                $store->setRelation('products', $store->products()->where('category_id', $category_id)->where('name', 'like', '%' . $searchProduct . '%')->paginate(10));
            }
        } else {
            if (is_null($searchProduct)) {
                $store->setRelation('products', $store->products()->paginate(10));

            } else {
                $store->setRelation('products', $store->products()->where('name', 'like', '%' . $searchProduct . '%')->paginate(10));
            }
        }
        return view('store.index', ['store' => $store, 'categories' => $parentCategories, 'brands' => $brands, 'mostviewed' => $product, 'subCategories' => $subCategories]);
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

    public function autocomplete($query)
    {
        $flyers = Category::select('name')->where('name', 'LIKE', '%' . $query . '%')->get();
        return \GuzzleHttp\json_encode($flyers);
    }
}
