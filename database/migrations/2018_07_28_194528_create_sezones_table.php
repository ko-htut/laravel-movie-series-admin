<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSezonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sezones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seriale_id')->unsigned()->nullable();
            $table->foreign('seriale_id')->references('id')->on('seriales')->onDelete('cascade');
            $table->string('sezone_nr');
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
        Schema::dropIfExists('sezones');
    }
}
