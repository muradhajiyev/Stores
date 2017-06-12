<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'profile_image_id', 'is_new', 'category_id', 'brand_id', 'store_id', 'currency_id'];

    public function images(){
        return $this->belongsToMany('App\Image', 'product_image', 'product_id', 'image_id');
    }
}
