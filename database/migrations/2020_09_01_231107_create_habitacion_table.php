<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitacion', function (Blueprint $table) {
            $table->increments('id_habitacion');
            $table->unsignedInteger('duracion_fuera');
            $table->date('fecha_ult_mant');
            $table->unsignedInteger('intervalo_mant');
            $table->unsignedInteger('nro_habitacion');
            $table->unsignedSmallInteger('piso');
            $table->unsignedSmallInteger('ala');
            $table->char('cod_clinica', 10);
            $table->char('indicador', 10)->nullable();
            $table->string('tipo_paciente', 30)->nullable();

            //foreign keys
            $table->unsignedInteger('id_tipo_habitacion');
            $table->foreign('id_tipo_habitacion')->references('id_tipo_habitacion')->on('tipo_habitacion');

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
        Schema::dropIfExists('habitacion');
    }
}
