<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorySpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category__specifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categ_id');
            $table->integer('spec_id');
            $table->foreign('categ_id')->references('id')->on('categories');
            $table->foreign('spec_id')->references('id')->on('specifications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category__specifications');
    }
}
