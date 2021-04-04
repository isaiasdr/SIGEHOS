<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasifCausaAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clasif_causa_atencion', function (Blueprint $table) {
            $table->bigIncrements('id_clasif_causa_atencion');
            $table->string('descripcion', 100);
            $table->string('cod_clasificacion', 20);

            //foreign key
            $table->unsignedBigInteger('id_causa_atencion');
            $table->foreign('id_causa_atencion')->references('id_causa_atencion')->on('causa_atencion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clasif_causa_atencion');
    }
}
