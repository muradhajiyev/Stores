<?php
/**
 * Created by PhpStorm.
 * User: Gadir
 * Date: 6/2/2017
 * Time: 4:43 PM
 */

namespace App\Http\Controllers;

use App\Dropdown;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Specification;
use Illuminate\Http\Request;
use App\Type;
use App\Unit;


class SpecificationsController
{
    public function getSpecifications(){
        $specifications = Specification::all();
//        $specs = DB::table('specifications')
//            ->join('types','types.id','=','specifications.type_id')
//            ->join('units','units.id','=','specifications.unit_id')
//            ->select('specifications.id','specifications.name','types.name','units.name')->get();

        return view('admin.specifications.specifications')->with('specifications',$specifications);
    }
    public function getSpecificationsForm(){
        $types = Type::all();
        $units = Unit::all();
        $dropdowns = Dropdown::all();
        return view('admin.specifications.specificationForm')->with('types',$types)->with('units',$units)->with('dropdowns',$dropdowns);
    }
    public function store(Request $request){
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

        return redirect('specifications');
    }
    public function delete($id){
        $specification = Specification::find($id);
        $specification->delete();
        return redirect('specifications');
    }
}