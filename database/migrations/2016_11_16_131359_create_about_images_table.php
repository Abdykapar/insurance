<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutImage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('about_id')->unsigned();
            $table->timestamps();

            $table->foreign('about_id')->references('id')->on('about');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aboutImage');
    }
}
