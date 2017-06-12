<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\currency;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {

        $this->middleware(['auth', 'adminOrStore'])->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $brands = Brand::all();
        $parentCategories = Category::all()->where('parent_id', null);
        $currencies = currency::all();
        return view('product.create')->with('brands', $brands)->with('parentCategories', $parentCategories)->with('currencies', $currencies);


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

        ]);
        $productName = $request->productName;
        $productPrice = $request->productPrice;
        $productCurrency = $request->productCurrency;
        $productCategory = $request->productCategory;
        $filename = 'hello';
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $photo) {
                $filename = $photo->store('images');

            }
        }
        return $filename;

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
}
