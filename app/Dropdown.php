<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dropdown extends Model
{
    public $timestamps = false;
    //
    public function dropdownValues(){
        return $this->hasMany('App\DropdownValue');
    }
}
