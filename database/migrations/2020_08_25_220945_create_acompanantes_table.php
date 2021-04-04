<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcompanantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acompanantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->unsignedBigInteger('cedula');
            $table->unsignedBigInteger('telefono');
            
            //foreign keys
            $table->unsignedInteger('id_parentesco');
            $table->foreign('id_parentesco')->references('id_parentesco')->on('parentesco');

            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->references('id_paciente')->on('paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acompanantes');
    }
}
