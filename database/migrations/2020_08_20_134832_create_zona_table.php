<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zona', function (Blueprint $table) {
            $table->increments('id_zona');
            $table->string('zona', 50);

            //foreign key
            $table->unsignedBigInteger('id_distrito');
            $table->foreign('id_distrito')->references('id_distrito')->on('distrito');

            $table->unsignedInteger('id_estado');
            $table->foreign('id_estado')->references('id_estado')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zona');
    }
}
