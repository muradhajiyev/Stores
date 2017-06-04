<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public $timestamps = false;

    public function type(){
        $this->belongsTo('App\Type');
    }
    public function unit(){
        $this->belongsTo('App\Unit');
    }
}
