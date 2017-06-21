<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dropdown extends Model
{
    public $timestamps = false;
    protected $appends = ['dropdown_value'];

    //
    public function dropdownValues(){
        return $this->hasMany('App\DropdownValue');
    }
    public function getDropdownValueAttribute(){
        return $this->dropdownValues;
    }
}
