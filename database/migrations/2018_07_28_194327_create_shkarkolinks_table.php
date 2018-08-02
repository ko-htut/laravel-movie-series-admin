<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShkarkolinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shkarkolinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('web_name');
            $table->string('web_url');
            $table->integer('shkarkolinkable_id');
            $table->string('shkarkolinkable_type');
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
        Schema::dropIfExists('shkarkolinks');
    }
}
