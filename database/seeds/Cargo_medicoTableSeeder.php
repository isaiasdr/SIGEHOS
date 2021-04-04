<?php

use Illuminate\Database\Seeder;

class Cargo_medicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargo_medico')->insert([
        	['descripcion' => 'Jefe de Cirujanos', 'id_estatus' => 8],
        	['descripcion' => 'Jefe de Servicio', 'id_estatus' => 8],
        	['descripcion' => 'Cirujano', 'id_estatus' => 8],
        	['descripcion' => 'Medico Responsable', 'id_estatus' => 8],
        	['descripcion' => 'Especialista', 'id_estatus' => 8],
        	['descripcion' => 'Traumalogo', 'id_estatus' => 9],
        	['descripcion' => 'Medico', 'id_estatus' => 9],
        	['descripcion' => 'Director Medico', 'id_estatus' => 9],
        	['descripcion' => 'Director de Enfermeria', 'id_estatus' => 9]
        ]);
    }
}
