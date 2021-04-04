<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasladoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslado', function (Blueprint $table) {
            $table->bigIncrements('id_traslado');
            $table->dateTime('fecha_estatus');
            $table->dateTime('fecha_solicitud');
            $table->unsignedInteger('nro_renglon');

            //foreign key
            $table->unsignedBigInteger('id_cama_act');
            $table->foreign('id_cama_act')->references('id_cama')->on('cama');

            $table->unsignedBigInteger('id_cama_solic');
            $table->foreign('id_cama_solic')->references('id_cama')->on('cama');

            $table->unsignedBigInteger('id_ingreso');
            $table->foreign('id_ingreso')->references('id_ingreso')->on('ingreso');

            $table->unsignedInteger('id_tipo_hab_solic');
            $table->foreign('id_tipo_hab_solic')->references('id_tipo_habitacion')->on('tipo_habitacion');

            $table->unsignedInteger('id_estatus');
            $table->foreign('id_estatus')->references('id_estatus')->on('estatus');

            $table->unsignedInteger('id_servicio_act');
            $table->foreign('id_servicio_act')->references('id_servicio')->on('servicio');

            $table->unsignedInteger('id_servicio_solic');
            $table->foreign('id_servicio_solic')->references('id_servicio')->on('servicio');

            $table->unsignedInteger('id_tipo_traslado');
            $table->foreign('id_tipo_traslado')->references('id_tipo_traslado')->on('tipo_traslado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traslado');
    }
}
