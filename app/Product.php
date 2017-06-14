<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'profile_image_id', 'is_new', 'category_id', 'brand_id', 'store_id', 'currency_id'];

    public function images(){
        return $this->belongsToMany('App\Image', 'product_image', 'product_id', 'image_id');
    }

    protected $appends = ['profile_url', 'img_urls'];


    public function profile_image(){
    	return $this->hasOne(Image::class, 'id', 'profile_image_id');
    }

    public function getProfileUrlAttribute()
    {

        return config('settings.base_url').config('settings.product_base_path').$this->profile_image->path;
    }

      public function getImgUrlsAttribute()
    {

       $st = Product_Image::where('product_id', $this->id)->pluck('product_id');
       $f = array();
       $i = 0;
       foreach($st as $im){
            $f[$i] = config('settings.base_url').config('settings.product_base_path'). Image::find($im)->path;
            $i++;
       }
       return $f;
    }
}
