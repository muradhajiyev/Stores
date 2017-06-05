<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropdownTabl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropdown_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dropdown_id');
            $table->foreign('dropdown_id')->references('id')->on('dropdowns');
            $table->string('dropdown_value');
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
