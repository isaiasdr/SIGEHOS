<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->bigIncrements('id_medico');
            $table->string('apellidos', 50);
            $table->boolean('atencion_dom');
            $table->boolean('atencion_lun');
            $table->boolean('atencion_mar');
            $table->boolean('atencion_mie');
            $table->boolean('atencion_jue');
            $table->boolean('atencion_vie');
            $table->boolean('atencion_sab');
            $table->unsignedBigInteger('cedula');
            $table->unsignedInteger('cupo_inter')->nullable();
            $table->unsignedInteger('cupo_primera')->nullable();
            $table->time('hora_desde_mañana')->nullable();
            $table->time('hora_desde_mañana1')->nullable();
            $table->time('hora_desde_tarde')->nullable();
            $table->time('hora_desde_tarde1')->nullable();
            $table->time('hora_hasta_mañana')->nullable();
            $table->time('hora_hasta_mañana1')->nullable();
            $table->string('nac', 45);
            $table->string('nombres', 30);
            $table->char('sexo', 1);
            $table->boolean('trato_medico')->nullable();
            $table->char('turno', 1);

            //foreign keys
            $table->unsignedInteger('id_cargo_medico');
            $table->foreign('id_cargo_medico')->references('id_cargo_medico')->on('cargo_medico');

            $table->unsignedInteger('id_estatus');
            $table->foreign('id_estatus')->references('id_estatus')->on('estatus');

            $table->unsignedInteger('id_servicio');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicio');

            $table->unsignedBigInteger('id_subespecialidad');
            $table->foreign('id_subespecialidad')->references('id_subespecialidad')->on('subespecialidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medico');
    }
}
