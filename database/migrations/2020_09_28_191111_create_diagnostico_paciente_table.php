<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticoPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico_paciente', function (Blueprint $table) {
            $table->bigIncrements('id_diagnostico_paciente');
            $table->string('diagnostico_paciente', 100);
            $table->unsignedInteger('nro_renglon');
            $table->string('origen_diagnostico', 40)->nullable();

            //foreign keys
            $table->unsignedBigInteger('id_diagnostico');
            $table->foreign('id_diagnostico')->references('id_diagnostico')->on('diagnostico');

            $table->unsignedBigInteger('id_ingreso');
            $table->foreign('id_ingreso')->references('id_ingreso')->on('ingreso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnostico_paciente');
    }
}
