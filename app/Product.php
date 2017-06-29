<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'profile_image_id', 'is_new', 'category_id', 'brand_id', 'store_id', 'currency_id','description'];

    protected $appends = ['profile_url', 'image_urls'];


    public function images()
    {
        return $this->belongsToMany('App\Image', 'product_image', 'product_id', 'image_id');
    }


    public function profile_image()
    {
        return $this->hasOne(Image::class, 'id', 'profile_image_id');
    }

    public function getProfileUrlAttribute()
    {
        return config('settings.base_url') . config('settings.product_base_path') . $this->profile_image->path;
    }

    public function getImageUrlsAttribute()
    {

        foreach ($this->images as $image) {
            $image->path = config('settings.base_url') . config('settings.product_base_path') . $image->path;
        }
        return $this->images;
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function currency()
    {

        return $this->belongsTo('App\currency');

    }
    public function specificationValues(){
        return $this->hasMany('App\Specification_Value');
    }


    public function specifications(){
        return $this->belongsToMany('App\Specification', 'specification_values', 'product_id', 'specification_id');
    }

//    protected $appends = ['profile_url', 'img_urls'];
//
//
//    public function profile_image(){
//    	return $this->hasOne(Image::class, 'id', 'profile_image_id');
//    }
//
//    public function getProfileUrlAttribute()
//    {
//
//        return config('settings.base_url').config('settings.product_base_path').$this->profile_image->path;
//    }
//
//      public function getImgUrlsAttribute()
//    {
//
//       $st = Product_Image::where('product_id', $this->id)->pluck('product_id');
//       $f = array();
//       $i = 0;
//       foreach($st as $im){
//            $f[$i] = config('settings.base_url').config('settings.product_base_path'). Image::find($im)->path;
//            $i++;
//       }
//       return $f;


}
