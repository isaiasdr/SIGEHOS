<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargoMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_medico', function (Blueprint $table) {
            $table->increments('id_cargo_medico');
            $table->string('descripcion', 50);

            //foreign key
            $table->unsignedInteger('id_estatus');
            $table->foreign('id_estatus')->references('id_estatus')->on('estatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargo_medico');
    }
}
