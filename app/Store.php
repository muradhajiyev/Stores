<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;
use App\Store_Image;

class Store extends Model
{
    
    protected $fillable = [
        'name', 'address', 'phone_number', 'description', 'slogan', 'email','user_id',
           ];
    protected $table = 'stores';

    protected $appends = ['profile_url', 'cover_urls'];


    public function profile_image(){
    	return $this->hasOne(Image::class, 'id', 'profile_image_id');
    }

    public function getProfileUrlAttribute()
    {

        return config('settings.base_url').config('settings.store_profile_base_path').$this->profile_image->path;
    }

      public function getCoverUrlsAttribute()
    {

       $st = Store_Image::where('store_id', $this->id)->pluck('image_id');
       $f = array();
       $i = 0;
       foreach($st as $im){
            $f[$i] = config('settings.base_url').config('settings.store_cover_base_path'). Image::find($im)->path;
            $i++;
       }
       return $f;
    }

}

