<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Specification;

use \App\Type;
use \App\Unit;
use \App\Dropdown;
class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specifications = Specification::all();
        return view('admin.tables.specifications.specifications')->with('specifications', $specifications);
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
        return view('admin.tables.specifications.specificationForm')->with('types', $types)->with('units', $units)->with('dropdowns', $dropdowns);
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
        $specification = Specification::find($id);
        $specification->delete();
        return redirect('/admin/specifications');
    }
}