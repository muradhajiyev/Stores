<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Store;
use App\Image;
use Illuminate\Support\Facades\Storage;
use App\Store_Image;

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
    public function index(Request $request)
    {  $userrole=Auth::user();

        $searchtext=strtolower($request->searchtext);


        if(isset($searchtext))
        {
            if( $userrole->isStore())

                $storelist= DB::table('stores')->where([
                    ['user_id', '=', $userrole->id],
                    [DB::raw('LOWER(name)'),  'LIKE', "%".$searchtext."%"]])->paginate(6);


            else if($userrole->isAdmin())

                $storelist= DB::table('stores')->where(DB::raw('LOWER(name)'), 'LIKE', "%".$searchtext."%")->paginate(6);

        }
        else {
            $userrole = Auth::user();

            if ($userrole->isStore())

                $storelist = DB::table('stores')->where('user_id', $userrole->id)->paginate(6);


            else if ($userrole->isAdmin())

                $storelist = DB::table('stores')->paginate(6);

        }
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
            'email'=>'required|email|unique:stores',

            'profile' => 'image|mimes:jpeg,bmp,png|max:4000',


            'cover' => 'image|mimes:jpeg,bmp,png|max:4000',

        ]);
        if(!isset($request->id)) {

            //default image id if user has not chosen any profile picture
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
            
            //request will send array of cover photos, then this part can be in foreach;
            if($request->hasFile('cover')){
                $cimage = new Image();
                $cimage->file_name = substr($request->file('cover')->store('public'),7);
                $cimage->extension = $request->cover->extension();
                $cimage->file_size = filesize($request->cover);
                $cimage->path = $request->file('cover')->store('public');
                $cimage->save();
                $storeImg = new Store_Image();
                $storeImg->store_id = $store->id;
                $storeImg->image_id = $cimage->id;
                $storeImg->save();  
            }    
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
        //files and images of store should be deleted
        return redirect()->action('StoreController@index');
    }
}
