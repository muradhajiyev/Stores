<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Dropdown;
use \App\DropdownValue;
use Illuminate\Support\Facades\DB;
class DropdownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware(['auth','adminOrStore']);
    }
    public function index()
    {
        //
        $dropdowns = Dropdown::all();
        return view('admin.dropdowns.index')->with('dropdowns', $dropdowns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.dropdowns.create');
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
        $dropdowns = new Dropdown();
        $dropdownValues = new DropdownValue();
        $dropdownName = $request->dropdownName;
        $dropdowns->name = $dropdownName;
        $dropdowns->save();
        $dropdown_id = $dropdowns->id;
        $myString = $request->dropdownValues;
        $myArray = explode(',', $myString);
        $massInsert = [];
        for ($i = 0; $i < count($myArray); $i++) {
            $massInsert[] = ['dropdown_id' => $dropdown_id, 'dropdown_value' => $myArray[$i]];
        }
        DropdownValue::insert($massInsert);
        return redirect('/admin/dropdowns');
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
        DB::table('dropdown_values')->where('dropdown_id', '=', $id)->delete();
        $dropdowns = Dropdown::find($id);
        $dropdowns->delete();
        return redirect('/admin/dropdowns');
    }
}
