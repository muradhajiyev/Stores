<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\StoredProcedure;
use Illuminate\Http\Request;
use \App\Specification;

use \App\Type;
use \App\Unit;
use \App\Dropdown;
use Illuminate\Support\Facades\DB;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware(['auth', 'adminOrStore'])->except(['getSpecifications', 'getSpecificationValues']);
    }

    public function index()
    {
        $specifications = Specification::all();
        return view('admin.specifications.index')->with('specifications', $specifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = Type::all();
        $units = Unit::all();
        $dropdowns = Dropdown::all();
        return view('admin.specifications.create')->with('types', $types)->with('units', $units)->with('dropdowns', $dropdowns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $specification = new Specification();

        //getting input valuse from form specifications form

        $name = $request->specificationName;
        $type = $request->specificationType;
        $unit = $request->specificationUnit;
        $dropdown = $request->specificationDropdown;

        //adding new specification

        $specification->name = $name;
        $specification->type_id = $type;
        $specification->unit_id = $unit;
        $specification->dropdown_id = $dropdown;

        $specification->save();

        return redirect('/admin/specifications');
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

        $specification = Specification::find($id);
        $types = Type::all()->except($specification->type_id);
        $units = Unit::all()->except($specification->unit_id);
        $dropdowns = Dropdown::all()->except($specification->dropdown_id);
        return view('admin.specifications.edit')->with('specification', $specification)->
        with('types', $types)->with('units', $units)->with('dropdowns', $dropdowns);
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
        $specification = Specification::find($id);
        $name = $request->specificationName;
        $type = $request->specificationType;
        $unit = $request->specificationUnit;
        $dropdown = $request->specificationDropdown;
        if ($specification) {
            $specification->name = $name;
            $specification->type_id = $type;
            $specification->unit_id = $unit;
            $specification->dropdown_id = $dropdown;
            if (Type::find($type)->name !== 'dropdown') {
                $specification->dropdown_id = null;

            }
            $specification->save();
        }
        return redirect('/admin/specifications');
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
        $specification = Specification::find($id);
        $specification->delete();
        return redirect('/admin/specifications');
    }

    public function getSpecTypeAndUnit($specId)
    {
        $specification = Specification::find($specId);
        if ($specification && $specification->unit) {
            return [$specification->type->name, $specification->unit->name];
        } else {
            return [$specification->type->name];
        }
    }

    public function getSpecifications(Request $request)
    {
        $categoryId = $request->categoryId;
        $storeId = $request->storeId;
        if ($categoryId && $storeId) {
            $specifications = StoredProcedure::getSpecificationsJson($categoryId, $storeId);
            return $specifications;
        }
    }

    public function getSpecificationValues(Request $request)
    {
        $specificationName = $request->specName;
        $categoryId = $request->categoryId;
        $storeId = $request->storeId;
        if ($categoryId && $storeId && $specificationName) {
            $specifications = StoredProcedure::getSpecificationValuesJson($specificationName, $categoryId, $storeId);
            return $specifications;


        }
    }


}
