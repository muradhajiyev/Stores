<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getSubCategories($id)
    {
        $subCategories = Category::all()->where('parent_id', $id)->toJson();
        return $subCategories;
    }
}
