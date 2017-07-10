<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\StoredProcedure;
use Illuminate\Http\Request;

use App\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{


    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function show(Request $request)
    {
        $subCategories = '';
        $id = $request->input('id');
        Session::put('category_id_store', $id);
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
        $store_id = $request->input('store_id');
        $category_id = $request->input('id');
        $category = null;
        $store = Store::find($store_id);
        if ($store) {
            $parentCategories = Category::all()->where('parent_id', null);
            $brands = DB::select('select data.* from getBrands(?) as data', array($store_id));
            $product = Product::where('store_id', $store_id)->orderBy('views', 'desc')->take(config('settings.max_most_viewed_product_count'))->get();
            if (!is_null($category_id)) {
                $subCategories = $this->getChildCategories($category_id);
                $category = Category::find($category_id);
            } else {
                $category_id = $request->productCategory;
                if (!is_null($category_id)) {
                    $subCategories = $this->getChildCategories($category_id);
                    $category = Category::find($category_id);
                }

            }
            $products = $this->search($request);
            $store->setRelation('products', $products->paginate(10)->withPath($request->fullUrl()));

            Session::put('store_id1', $store_id);
            Session::put('category_id_product', $category_id);
            return view('store.index', ['store' => $store, 'categories' => $parentCategories, 'brands' => $brands, 'mostviewed' => $product, 'subCategories' => $subCategories, 'category' => $category, 'jsonRequest' =>json_encode($request->all())]);
        } else {

            return view('errors.404');
        }
    }

    public function search($request)
    {
        $storeId = $request->store_id; //required
        $categoryIdRequest = $request->productCategory;
        $categoryId1Request = $request->id;
        $mPrice = $request->minPrice;
        $mxPrice = $request->maxPrice;
        $used = $request->used;
        $new = $request->new;
        $brandId = $request->brand_id;
        $searchProduct = $request->searchProductName;
        $specificationFilter = '';
        $specificationJoin = '';
        $categoryId = null;
        if (isset($categoryIdRequest)) {
            $category = Category::find($categoryIdRequest);
            $categoryId = $categoryIdRequest;
        } else {
            $category = Category::find($categoryId1Request);
            $categoryId = $categoryId1Request;
        }
        $store = Store::find($storeId);
        $minPrice = null;
        $maxPrice = null;
        $isNew = null;
        if (isset($mPrice)) {
            $minPrice = $mPrice;
        }
        if (isset($mxPrice)) {
            $maxPrice = $mxPrice;
        }
        if (isset($searchProduct)) {
            $searchProduct = "'%$searchProduct%'";
        }

        if ($used == 1 && $new != 1) {
            $isNew = false;
        } elseif ($new == 1 && $used != 1) {
            $isNew = true;
        }


        $index = 1;
        if ($store && $category) {
            $specificationValues = StoredProcedure::getSpecifications($categoryId, $storeId);
            foreach ($specificationValues as $specification) {
                $specName = $this->removeSpaces($specification->specification_name);
                if (isset($request->$specName)) {
                    $specificationJoin .= " INNER JOIN specification_values spec$index ON spec$index.product_id = p.id AND spec$index.specification_id=$specification->specification_id";

                    $specificationFilter .= " and spec$index.value in (";
                    foreach ($request->$specName as $value) {
                        $specificationFilter .= "'" . $value . "', ";
                    }
                    $specificationFilter = substr($specificationFilter, 0, -2);
                    $specificationFilter .= ')';
                    $index++;

                }
            }


        }
        $productIds = StoredProcedure::getProducts($storeId, $categoryId, $brandId, $isNew, $minPrice, $maxPrice, $searchProduct, $specificationFilter, $specificationJoin);
        $idArray = array();
        foreach ($productIds as $productId) {
            array_push($idArray, $productId->productid);
        }
        $products = Product::whereIn('id', $idArray);
        return $products;


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index()
    {
        return view('/home');
    }

    public
    function autocompleteStore(Request $request)
    {
        $query = $request->get('query', '');
        $category_id = Session::get('category_id_store');
        if (!is_null($category_id)) {
            $store_ids = Product::where('category_id', $category_id)->pluck('store_id')->toArray();
            $result = Store::whereIn('id', $store_ids)->where('name', 'LIKE', '%' . $query . '%')->pluck('name');
        } else {
            $result = Store::where('name', 'LIKE', '%' . $query . '%')->pluck('name');
        }
        return response()->json($result);
    }

    public
    function autocompleteProduct(Request $request)
    {
        $query = $request->get('query', '');
        $category_id = Session::get('category_id_product');
        $store_id = Session::get('store_id1');
        if (!is_null($category_id)) {
            $result = Product::where('store_id', $store_id)->where('category_id', $category_id)->where('name', 'LIKE', '%' . $query . '%')->pluck('name');
        } else {
            $result = Product::where('store_id', $store_id)->where('name', 'LIKE', '%' . $query . '%')->pluck('name');
        }
        return response()->json($result);
    }

    public
    function removeSpaces($name)
    {
        $name = preg_replace('/\s+/', '', $name);
        return $name;
    }

}
