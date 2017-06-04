<?php

namespace App\Http\Controllers;

use App\Dropdown;
use App\DropdownValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownsController extends Controller
{
    public function getDropdowns(){
        $dropdowns = Dropdown::all();
        return view('admin.dropdowns.dropdowns')->with('dropdowns',$dropdowns);
    }
    public function getDropdownsForm(){
        return view('admin.dropdowns.addDropdown');
    }
    public function store(Request $request){
        $dropdowns = new Dropdown();
        $dropdownValues = new DropdownValue();
        $dropdownName = $request->dropdownName;
        $dropdowns->name = $dropdownName;
        $dropdowns->save();
        $dropdown_id = $dropdowns->id;
        $myString = $request->dropdownValues;
        $myArray = explode(',',$myString);
        $massInsert = [];
        for($i = 0; $i<count($myArray); $i++){
            $massInsert[] = ['dropdown_id' => $dropdown_id, 'dropdown_value' => $myArray[$i]];
        }
        DropdownValue::insert($massInsert);
        return redirect('dropdowns');
    }
    public function delete($id){
        DB::table('dropdown_values')->where('dropdown_id', '=', $id)->delete();
        $dropdowns = Dropdown::find($id);
        $dropdowns->delete();

        return redirect('dropdowns');
    }
}
