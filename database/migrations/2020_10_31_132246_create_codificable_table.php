<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodificableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codificable', function (Blueprint $table) {
            $table->bigIncrements('id_codificable');
            $table->string('diagnostico_paciente', 100);
            $table->string('codigo', 30);
            $table->dateTime('fecha');

            //foreign keys
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
        Schema::dropIfExists('codificable');
    }
}
