<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\currency;
use App\Image;
use App\Product;
use App\Product_Image;
use App\Specification_Value;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth', 'adminOrStore'])->except('index', 'getAllProducts');
        $this->middleware(['storeOwner'])->only('create','store', 'update', 'edit', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Product::find($id);
        $product->views = $product->views + 1;
        $product->save();
        $imagesArray = Product_Image::where('product_id', $id)->pluck('image_id')->toArray();
        $images = Image::whereIn('id',$imagesArray)->get();
        return view('product.productdetails', ['product' => $product, 'images' => $images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $brands = Brand::all();
        $parentCategories = Category::all()->where('parent_id', null);
        $currencies = currency::all();
        $store= Store::find($request->store);
        return view('product.create')->with('brands', $brands)->with('parentCategories', $parentCategories)->with('currencies', $currencies)->with('store', $store);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'productName' => 'required|max:100',
            'productPrice' => 'required|numeric|min:0',
            'productCurrency' => 'required',
            'productCategory' => 'required',
            'imageIds' => 'required'

        ]);
        $productName = $request->productName;
        $productPrice = $request->productPrice;
        $productCurrency = $request->productCurrency;
        $productCategory = $request->productCategory;
        $productStore = $request->store;
        $isNew = $request->isNew;
        $productBrand = $request->productBrand;
        $imageIDs = $request->imageIds;
        $profileImageId = reset($imageIDs);

        $productSpec = $request->productSpec;
        $specValue = $request->specValue;
        $product = Product::create([
            'name' => $productName,
            'price' => $productPrice,
            'category_id' => $productCategory,
            'currency_id' => $productCurrency,
            'store_id' => $productStore,
            'is_new' => $isNew,
            'brand_id' => $productBrand,
            'profile_image_id' => $profileImageId
        ]);
        foreach ($imageIDs as $imageID) {
            Product_Image::create([
                'product_id' => $product->id,
                'image_id' => $imageID
            ]);
        }

        for ($i = 0; $i < count($productSpec); $i++) {
            if ($productSpec[$i] && $specValue[$i]) {
                Specification_Value::create(['product_id' => $product->id,
                    'specification_id' => $productSpec[$i],
                    'value' => $specValue[$i]]);
            }
        }


        return redirect('/store/' . $productStore);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllProducts(Request $request)
    {
      $store_id = $request->store_id;

      if($store_id == NULL) {
        $products = Product::orderBy('id', 'desc')->paginate(8);
      } else {
        $products = Product::where('store_id', $store_id)->orderBy('id', 'desc')->paginate(8);
      }

      return $products;
    }
}
