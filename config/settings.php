<?php
return [

   /*
   |--------------------------------------------------------------------------
   | Application Covere Photo Limit
   |--------------------------------------------------------------------------
   |
   | This value is limit for the number of cover photos a store user can upload
   */

   'max_cover_photo_count' => "3",

   'max_product_photo_count' => "3",
   'max_file_size' => "4",

   //'base_url' =>"http://13.95.154.68/",

   'base_url' =>"http://localhost:8000/storage/", //addition

   'product_base_path' => "images/stores/products/",
   // 'store_cover_base_path' => "images/stores/covers/",
   // 'store_profile_base_path' => "images/stores/profiles/",
   'user_base_path' => "images/users/",

   'store_cover_base_path' => "public/",
   'store_profile_base_path' => "public/",
  
   ];