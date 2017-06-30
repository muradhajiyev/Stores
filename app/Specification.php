<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public $timestamps = false;
    protected $appends = ['spec_values', 'spec_unit', 'spec_dropdown'];

    public function type(){
       return $this->belongsTo('App\Type');
    }
    public function unit(){
       return $this->belongsTo('App\Unit');
    }
    public function dropdown(){
        return $this->belongsTo('App\Dropdown');
    }
    public function values(){
        return $this->hasMany('App\Specification_Value');
    }

    public function getSpecValuesAttribute(){
        return $this->values()->distinct('value')->get();
    }
    public function getSpecUnitAttribute(){
        return $this->unit;
    }
    public function getSpecDropdownAttribute(){
        return $this->dropdown;
    }

}
