<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico', function (Blueprint $table) {
            $table->bigIncrements('id_diagnostico');
            $table->string('descripcion', 100);
            $table->string('cod_diagnostico', 20)->nullable();
            $table->unsignedInteger('cod_morbilidad')->nullable();
            $table->char('codificable', 1)->nullable();
            $table->char('denunciable', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnostico');
    }
}
