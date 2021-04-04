<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio', function (Blueprint $table) {
            $table->increments('id_servicio');
            $table->string('descripcion', 100);
            $table->boolean('apoyo');
            $table->unsignedSmallInteger('piso');
            $table->char('puesto', 10);
            $table->char('tipo', 10);

            //foreign keys
            $table->unsignedInteger('id_tipo_servicio');
            $table->foreign('id_tipo_servicio')->references('id_tipo_servicio')->on('tipo_servicio');

            $table->unsignedInteger('id_departamento');
            $table->foreign('id_departamento')->references('id_departamento')->on('departamento');

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
        Schema::dropIfExists('servicio');
    }
}
