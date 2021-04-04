<?php

use Illuminate\Database\Seeder;

class Evento_sistemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evento_sistema')->insert([
        	['descripcion' => 'Login'],
        	['descripcion' => 'Logout'],
        	['descripcion' => 'Registro paciente'],
        	['descripcion' => 'Modificacion paciente'],
        	['descripcion' => 'Registro admision'],
        	['descripcion' => 'Modificacion admision'],
        	['descripcion' => 'Solicitud traslado'],
            ['descripcion' => 'Asignacion cama traslado'],
        	['descripcion' => 'Modificacion traslado'],
        	['descripcion' => 'Registro alta'],
        	['descripcion' => 'Modificacion alta'],
            ['descripcion' => 'Registro permiso'],
            ['descripcion' => 'Modificacion permiso']
        ]);
    }
}
