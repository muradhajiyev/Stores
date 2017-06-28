<?php

namespace App\Http\Controllers;
use App\Product;
use App\Product_Image;
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
      $this->middleware('auth')->except('getAllStores');
   }

   /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(Request $request)
   {
      $userrole=Auth::user();
      if(isset($request->searchtext)) {
          $searchtext=strtolower($request->searchtext);
         if( $userrole->isStore())
         $storelist= Store::where([
            ['user_id', '=', $userrole->id],
            [DB::raw('LOWER(name)'),  'LIKE', "%".$searchtext."%"]])->paginate(4);
            else if($userrole->isAdmin())
            $storelist= Store::where(DB::raw('LOWER(name)'), 'LIKE', "%".$searchtext."%")->paginate(6);
         } else {
            $userrole = Auth::user();
            if ($userrole->isStore())
            $storelist = Store::where('user_id', $userrole->id)->paginate(6);
            else if ($userrole->isAdmin())
            $storelist = Store::paginate(6);
         }
         //return $storelist;
         //return view('admin.store.edit',['store'=>$store]);

         return view('admin.store.index', ['storelist' => $storelist,] );//->with(array('storelist'=>$storelist));
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
         //create new store
         if(!isset($request->id)) {
            $this->validate($request, [
               'name' => 'required|unique:stores',
               'email'=>'required|email|:stores',
               'description'=>'required|max:1000',
               'avatar' => 'image|mimes:jpeg,bmp,png|max:4000',
               'imageIds' => 'required'
               //'cover' => 'image|mimes:jpeg,bmp,png|max:4000',

            ]);
            //default image id if user has not chosen any profile picture
            $imgId = 1;
            if($request->hasFile('avatar')) {

               $dir = config('settings.store_profile_base_path') . date("Y-m-d");
               $path = $request->file('avatar')->store($dir);
               $filename = substr($path,strlen($dir) + 1);
               $image = new Image();
               $image->file_name = $filename;
               $image->extension = $request->avatar->extension();
               $image->file_size = filesize($request->avatar);
               $image->path = date("Y-m-d").'/'.$filename;
               $image->save();
               $imgId = $image->id;

            }

            $store = new Store();
            $store->user_id = $request->user_id;
            $store->name = $request->name;
            $store->address = $request->address;
            $store->description=$request->description;
            $store->slogan=$request->slogan;
            $store->phone_number = $request->phonenumber;
            $store->email = $request->email;
            $store->profile_image_id = $imgId;
            $store->save();

            $imageIDs = $request->imageIds;
            foreach ($imageIDs as $imageID) {
               Store_Image::create([
                  'store_id' => $store->id,
                  'image_id' => $imageID
               ]);
            }


         }
         //edit existing store
         else {
            $this->validate($request, [
               'name' => 'required',
               'email'=>'required|email',
               'description'=>'required|max:255',
               'avatar' => 'image|mimes:jpeg,bmp,png|max:4000',
               //'cover' => 'image|mimes:jpeg,bmp,png|max:4000',

            ]);
            $store = Store::find($request->id);


            $store->name = $request->name;
            $store->address = $request->address;
            $store->phone_number = $request->phonenumber;
            $store->email = $request->email;
            $store->description=$request->description;
            $store->slogan=$request->slogan;
            //if user has chosen avatar replace it
            if($request->hasFile('avatar')) { 
             $dir = config('settings.store_profile_base_path') . date("Y-m-d");
             $path = $request->file('avatar')->store($dir);
             $filename = substr($path,strlen($dir) + 1);  

             $img = $store->profile_image_id;
      
             $image = new Image();     
             $image->file_name = $filename;
             $image->extension = $request->avatar->extension();
             $image->file_size = filesize($request->avatar);
             $image->path = date("Y-m-d").'/'.$filename;
             $image->save();
             $store->profile_image_id = $image->id;
             //if image is in Store_Image table delete it.
             $store_img = Store_Image::where('image_id', $img)->first();
              if(!is_null($store_img)){
                $store_img->delete();
              }
            }
            $store->save();
            //if user has added new cover photos add them
            if($request->has('imageIds')){
            $imageIDs = $request->imageIds;
            foreach ($imageIDs as $imageID) {
               Store_Image::create([
                  'store_id' => $store->id,
                  'image_id' => $imageID
               ]);
            }
          }
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

         //$store = DB::table('stores')->where('id', $id)->first();
         $store = Store::where('id', $id)->first();
         //return $store;

         return view('admin.store.edit',['store'=>$store]);
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
      public function destroy($id)//, Request $request)
      {
        //deleting stores
         DB::table('store_image')->where('store_id', '=', $id)->delete();
         DB::table('store_image')->where('store_id', '=', $id)->delete();
         $product_id_array = Product::where('store_id',$id)->pluck('id')->toArray();
         Product_Image::whereIn('product_id',$product_id_array)->forceDelete();
         Product::whereIn('id',$product_id_array)->forceDelete();
         $store = Store::find($id);
         $store->delete();
         //files and images of store should be deleted
        return redirect()->action('StoreController@index');
      }

      public function deleteCover($id){
         $store_img = Store_Image::where('image_id', $id)->first();
         $store_img->delete();
         $img = Image::find($id);
         $img->delete();
         return $id;
      }

      public function getAllStores()
      {
         $stores = Store::orderBy('id', 'desc')->paginate(8);
         return $stores;
      }
   }
