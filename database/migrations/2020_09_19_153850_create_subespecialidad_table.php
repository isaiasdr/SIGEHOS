<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubespecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subespecialidad', function (Blueprint $table) {
            $table->bigIncrements('id_subespecialidad');
            $table->string('descripcion', 30);
            $table->unsignedInteger('codigo');
            $table->unsignedInteger('piso');

            //foreign key
            $table->unsignedInteger('id_estatus');
            $table->foreign('id_estatus')->references('id_estatus')->on('estatus');

            $table->unsignedInteger('id_servicio');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subespecialidad');
    }
}
