<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosSistemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_sistema', function (Blueprint $table) {
            $table->bigIncrements('id_registros_sistema');
            $table->string('descripcion', 255);
            $table->dateTime('fecha_hora');

            //foreign keys
            $table->unsignedInteger('id_evento_sistema');
            $table->foreign('id_evento_sistema')->references('id_evento_sistema')->on('evento_sistema');

            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros_sistema');
    }
}
