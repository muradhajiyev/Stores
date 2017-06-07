<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
       Schema::table('categories', function (Blueprint $table) {
           $table->foreign('parent_id')->references('id')->on('categories');
       });

       Schema::table('product', function (Blueprint $table) {
           $table->foreign('profile_image_id')->references('id')->on('images');
           $table->foreign('brand_id')->references('id')->on('brands');
           $table->foreign('category_id')->references('id')->on('categories');
       });

       Schema::table('images', function (Blueprint $table) {
           $table->foreign('product_id')->references('id')->on('product');
       });

       Schema::table('specification_values', function (Blueprint $table) {
           $table->foreign('product_id')->references('id')->on('product');
           $table->foreign('specification_id')->references('id')->on('specifications');
       });

       Schema::table('specifications', function (Blueprint $table) {
           $table->foreign('type_id')->references('id')->on('types');
           $table->foreign('unit_id')->references('id')->on('units');
       });

       Schema::table('dropdowns', function (Blueprint $table) {
           $table->foreign('specification_id')->references('id')->on('specifications');
           $table->foreign('dropdown_source_id')->references('id')->on('dropdown_sources');
       });

       Schema::table('stores', function (Blueprint $table) {
           $table->foreign('user_id')->references('id')->on('users');
       });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
