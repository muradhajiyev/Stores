<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification_Value extends Model
{
    //
    protected $table="specification_values";
    protected $fillable=['product_id', 'value', 'specification_id'];
    public function specification(){
        return $this->belongsTo('App\Specification');
    }
}
