<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Store;
use App\Image;
use Illuminate\Support\Facades\Storage;

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

        $storelist= DB::table('stores')->where('user_id',$userrole->id)->paginate(6);

        // return $storelist;


        elseif($userrole->isAdmin())

        $storelist= DB::table('stores')->paginate(6);


       return view('admin.store.index')->with(array('storelist'=>$storelist));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


    public function create()
    {
        return view('admin.store.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:stores',
            'email'=>'required|email|unique:stores'

        ]);
        if(!isset($request->id)) {
            $imgId = 1;
            if($request->hasFile('avatar')){
            $image = new Image();
            $image->file_name = substr($request->file('avatar')->store('public'),7);
            $image->extension = $request->avatar->extension();
            $image->file_size = filesize($request->avatar);
            $image->path = $request->file('avatar')->store('public');
            $image->save();
            $imgId = $image->id;
            }

            $store = new Store();
            $store->user_id = $request->user_id;
            $store->name = $request->name;
            $store->address = $request->address;
            $store->phone_number = $request->phonenumber;
            $store->email = $request->email;
            $store->profile_image_id = $imgId;
            $store->save();        
        }
        else {
            $store = Store::find($request->id);

            $store->name = $request->name;
            $store->address = $request->address;
            $store->phone_number = $request->phonenumber;
            $store->email = $request->email;
            $store->save();
        }

        return redirect()->action('StoreController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {


}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $store = DB::table('stores')->where('id', $id)->first();

        return view('admin.store.edit',array('store'=>$store));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();
        return redirect()->action('StoreController@index');
    }
}
