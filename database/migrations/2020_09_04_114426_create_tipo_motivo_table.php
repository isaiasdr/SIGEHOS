<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoMotivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_motivo', function (Blueprint $table) {
            $table->increments('id_tipo_motivo');
            $table->string('descripcion', 100);

            //foreign key
            $table->unsignedInteger('id_motivo_atencion');
            $table->foreign('id_motivo_atencion')->references('id_motivo_atencion')->on('motivo_atencion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_motivo');
    }
}
