<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Store;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userrole=Auth::user();
        if( $userrole->isStore())

            $storelist=Store::where('user_id',$userrole->id)->get();

        else if($userrole->isAdmin())
            $storelist=Store::all();

        return view('store.storelist')->with(array('storelist'=>$storelist));
    }


    public function deleteEditStore(Request $request)
    {
        if($request->button=='Delete') {
            $store = Store::find($request->storeid);
            $store->delete();

        }
        else if($request->button='Edit'){
            $store =Store::find($request->storeid);

            $store->name = $request->name;
            $store->address=$request->address;
            $store->phone_number=$request->phonenumber;
            $store->email=$request->email;
            $store->save();

        }

    }


    public function addStore(Request $request)
    {

        $store =new Store();
        $store->user_id=$request->user_id;
        $store->name = $request->name;
        $store->address=$request->address;
        $store->phone_number=$request->phonenumber;
        $store->email=$request->email;
        $store->save();


    }
}
