<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso', function (Blueprint $table) {
            $table->bigIncrements('id_ingreso');
            $table->unsignedBigInteger('ingreso')->unique();
            $table->unsignedBigInteger('cedula_medico')->nullable();
            $table->dateTime('fecha_ingreso');
            $table->dateTime('fecha_alta_medica')->nullable();
            $table->char('cod_clasf_causa', 20);
            $table->char('cod_procedimiento', 20)->nullable();

            //foreign key
            $table->unsignedBigInteger('id_cama_inicial');
            $table->foreign('id_cama_inicial')->references('id_cama')->on('cama');

            $table->unsignedBigInteger('id_cama');
            $table->foreign('id_cama')->references('id_cama')->on('cama');

            $table->unsignedInteger('id_causa_atencion');
            $table->foreign('id_causa_atencion')->references('id_causa_atencion')->on('causa_atencion');

            $table->unsignedInteger('id_causa_egreso');
            $table->foreign('id_causa_egreso')->references('id_causa_egreso')->on('causa_egreso');

            $table->unsignedInteger('id_estatus_paciente');
            $table->foreign('id_estatus_paciente')->references('id_estatus_paciente')->on('estatus_paciente');

            $table->unsignedInteger('id_referencia');
            $table->foreign('id_referencia')->references('id_referencia')->on('referencia');

            //$table->unsignedInteger('id_tipo_motivo');
            //$table->foreign('id_tipo_motivo')->references('id_tipo_motivo')->on('tipo_motivo');

            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->references('id_paciente')->on('paciente');

            $table->unsignedInteger('id_servicio');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicio');

            $table->unsignedInteger('id_servicio_inicial');
            $table->foreign('id_servicio_inicial')->references('id_servicio')->on('servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso');
    }
}
