<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewStoreColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('stores', function (Blueprint $table) {
            $table->String('slogan');
            $table->String('description');
        });
        DB::statement("ALTER TABLE stores MODIFY COLUMN slogan VARCHAR(255) AFTER updated_at");
        DB::statement("ALTER TABLE stores MODIFY COLUMN description VARCHAR(255) AFTER slogan");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['slogan', 'description']);
        });
    }
}
