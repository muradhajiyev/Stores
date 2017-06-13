<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    //
    protected $table = 'product_image';
    protected $fillable = ['product_id', 'image_id'];
}
