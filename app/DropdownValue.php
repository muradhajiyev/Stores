<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DropdownValue extends Model
{
    public $timestamps = false;
    protected $fillable = array('dropdown_id','dropdown_value');
}
