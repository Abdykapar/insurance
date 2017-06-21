<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToSubmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submenu', function (Blueprint $table) {
//            $table->integer('file_id')->unsigned();
            $table->foreign('file_id')->references('id')->on('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submenu', function (Blueprint $table) {
            //
        });
    }
}
