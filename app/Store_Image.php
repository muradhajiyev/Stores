<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_Image extends Model
{
    //
    protected $table = 'store_image';
    protected $fillable = ['store_id', 'image_id'];
}
