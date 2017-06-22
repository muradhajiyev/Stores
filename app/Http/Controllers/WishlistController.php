<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Brand;
use \App\wishlist;
use App\Product;



class WishlistController extends Controller
{
        public function addwish(Request $request){
        $data1=$request->product_id;
        $data2=Auth::user()->id;


        $product=\DB::table('wishlists')->select('product_id')->where('product_id',$data1)->get();
        $userr=\DB::table('wishlists')->select('user_id')->where('user_id',$data2)->get();
        if(count($product) <1) {
            if(count($userr) >0) {
         $wishlist = new wishlist();
         $wishlist->product_id = $data1;
         $wishlist->user_id = $data2;

         $wishlist->save();
     }}


     if(count($product) <1) {
            if(count($userr) <1) {
         $wishlist = new wishlist();
         $wishlist->product_id = $data1;
         $wishlist->user_id = $data2;

         $wishlist->save();
     }}


     if(count($product) >0) {
            if(count($userr) <1) {
         $wishlist = new wishlist();
         $wishlist->product_id = $data1;
         $wishlist->user_id = $data2;

         $wishlist->save();
     }}
        	return response()->json($data2);

    }


    public function showwish(Request $request){
          $id=Auth::user()->id;
        // $prod = \DB::Table('products')->join('wishlists', 'products.id', '=', 'wishlists.product_id')->where('wishlists.user_id', '=', $id)->get();
          $prod_id = wishlist::where('user_id',$id)->pluck('product_id')->toArraY();
          $prod = Product::whereIn('id',$prod_id)->get();
      $data=\DB::table('wishlists')->get();
         if($request->ajax()){
        return response()->json($data);
         }
                  
            return view('product.wishlist' ,compact('prod'));
        }

    public function removewish(Request $request){
         $id=Auth::user()->id;
         $product_id = request()->input('product_id');
        \DB::table('wishlists')->where([['product_id', '=', $product_id], ['user_id', '=', $id],])->delete();
                  
          $prod_id = wishlist::where('user_id',$id)->pluck('product_id')->toArraY();
          $prod = Product::whereIn('id',$prod_id)->get();
            return view('product.wishlist' ,compact('prod'));
        }
}
