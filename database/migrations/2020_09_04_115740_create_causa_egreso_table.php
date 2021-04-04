<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausaEgresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causa_egreso', function (Blueprint $table) {
            $table->increments('id_causa_egreso');
            $table->string('codigo', 10);
            $table->string('descripcion', 100);
            $table->string('tipo_alta', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('causa_egreso');
    }
}
