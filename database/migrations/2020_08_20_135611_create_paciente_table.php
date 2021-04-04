<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->bigIncrements('id_paciente');
            $table->string('apellido_ref', 50)->nullable();
            $table->string('apellido_ref1', 50)->nullable();
            $table->char('tipo_cedula', 1);
            $table->unsignedBigInteger('cedula')->unique();
            $table->unsignedBigInteger('cedula_ref')->nullable()->unique();
            $table->unsignedBigInteger('cedula_ref1')->nullable()->unique();
            $table->unsignedBigInteger('correlativo_ci')->nullable();
            $table->text('direccion')->nullable();
            $table->string('edo_civil', 20)->nullable();
            $table->dateTime('fecha_historia');
            $table->dateTime('modificacion_historia');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('lugar_nacimiento')->nullable();
            $table->string('historia', 50)->unique();
            $table->string('nacionalidad', 100)->nullable();
            $table->string('nombre_ref', 40)->nullable();
            $table->string('nombre_ref1', 40)->nullable();
            $table->unsignedInteger('num')->nullable();
            $table->string('primer_apellido', 40)->nullable();
            $table->string('primer_nombre', 30)->nullable();
            $table->string('segundo_apellido', 40)->nullable();
            $table->string('segundo_nombre', 30)->nullable();
            $table->char('sexo', 1);
            $table->unsignedBigInteger('telefono')->nullable();
            $table->unsignedBigInteger('tlf_ref')->nullable();
            $table->unsignedBigInteger('tlf_ref1')->nullable();

            //foreign keys
            $table->unsignedInteger('id_ocupacion');
            $table->foreign('id_ocupacion')->references('id_ocupacion')->on('ocupacion');

            $table->unsignedInteger('id_nacionalidad');
            $table->foreign('id_nacionalidad')->references('id_nacionalidad')->on('nacionalidad');

            $table->unsignedInteger('id_religion');
            $table->foreign('id_religion')->references('id_religion')->on('religion');

            $table->unsignedInteger('id_profesion');
            $table->foreign('id_profesion')->references('id_profesion')->on('profesion');

            $table->unsignedInteger('id_zona');
            $table->foreign('id_zona')->references('id_zona')->on('zona');

            $table->unsignedInteger('id_estatus');
            $table->foreign('id_estatus')->references('id_estatus')->on('estatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
