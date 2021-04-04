<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cama', function (Blueprint $table) {
            $table->bigIncrements('id_cama');
            $table->string('codigo_cama', 20);
            $table->string('estatus', 30);
            $table->dateTime('fecha_estatus');
            $table->char('tipo_ingreso', 1);

            //foreign keys
            $table->unsignedInteger('id_habitacion');
            $table->foreign('id_habitacion')->references('id_habitacion')->on('habitacion');

            $table->unsignedInteger('id_motivo_mant_cama');
            $table->foreign('id_motivo_mant_cama')->references('id_motivo_mant_cama')->on('motivo_mant_cama');

            $table->unsignedInteger('id_tipo_cama');
            $table->foreign('id_tipo_cama')->references('id_tipo_cama')->on('tipo_cama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cama');
    }
}
