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
   'max_most_viewed_product_count' => "9", //recommended to be divisible by 3

   'max_product_photo_count' => "3",
   'max_file_size' => "4", //mb

   'base_url' =>"http://13.95.154.68/",

   //'base_url' =>"http://localhost:8000/storage/", //addition for testing

   'product_base_path' => "images/stores/products/",
   'store_cover_base_path' => "images/stores/covers/",
   'store_profile_base_path' => "images/stores/profiles/",
   'blog_base_path'=>"images/stores/blogs/",
   'user_base_path' => "images/users/",

   //'store_cover_base_path' => "public/", addition for local testing
   //'store_profile_base_path' => "public/", addition for local testing
  
   ];