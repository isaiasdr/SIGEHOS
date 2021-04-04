<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_usuario');
            $table->unsignedBigInteger('cedula')->unique();
            $table->string('clave', 255);
            $table->unsignedTinyInteger('estatus');
            $table->dateTime('fecha_creacion');
            $table->string('nombres', 100);
            $table->string('apellido', 100);
            $table->string('login', 45)->unique();

            //foreign key
            $table->unsignedBigInteger('id_tipo_usuario');
            $table->foreign('id_tipo_usuario')->references('id_tipo_usuario')->on('tipo_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
