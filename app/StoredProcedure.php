<?php
/**
 * Created by PhpStorm.
 * User: saria
 * Date: 6/23/2017
 * Time: 2:11 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

class StoredProcedure
{
    public static function getSpecifications($categoryId, $storeId)
    {
        $specifications = DB::select('select data.* from getSpecifications(?,?) as data', array($categoryId, $storeId));
        return $specifications;
    }

    public static function getSpecificationValues($specificationName, $categoryId, $storeId)
    {
        $specificationValues = DB::select('select data.* from getSpecificationvalues(?,?,?) as data', array($specificationName, $categoryId, $storeId));
        return $specificationValues;
    }

    public static function getSpecificationsJson($categoryId, $storeId)
    {
        $specifications = DB::select('select json_agg(data.*) from getSpecifications(?,?) as data', array($categoryId, $storeId));
        return $specifications;
    }

    public static function getSpecificationValuesJson($specificationName, $categoryId, $storeId)
    {
        $specificationValues = DB::select('select json_agg(data.*) from getSpecificationvalues(?,?,?) as data', array($specificationName, $categoryId, $storeId));
        return $specificationValues;
    }

    public static function getProducts($storeId, $categoryId, $brandId, $isNew, $minPrice, $maxPrice, $productname, $specificationFilter, $specificationJoin)
    {
        $products = DB::select('select productId.* from getProducts(?,?,?,?,?,?,?,?,?) as productId', array($storeId, $categoryId, $brandId, $isNew, $minPrice, $maxPrice, $productname, $specificationFilter, $specificationJoin));
        return $products;
    }
}