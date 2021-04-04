<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisoPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_paciente', function (Blueprint $table) {
            $table->bigIncrements('id_permiso_paciente');
            $table->unsignedInteger('estatus');
            $table->dateTime('fecha_reintegro');
            $table->unsignedBigInteger('nro_permiso');

            //foreign keys
            $table->unsignedBigInteger('id_ingreso');
            $table->foreign('id_ingreso')->references('id_ingreso')->on('ingreso');

            $table->unsignedInteger('id_motivo_permiso');
            $table->foreign('id_motivo_permiso')->references('id_motivo_permiso')->on('motivo_permiso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permiso_paciente');
    }
}
