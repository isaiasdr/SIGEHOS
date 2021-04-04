<?php

use Illuminate\Database\Seeder;

class OcupacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ocupacion')->insert([
            ['descripcion' => 'Desconocido'],
        	['descripcion' => 'Director'],
        	['descripcion' => 'Coordinador'],
        	['descripcion' => 'Secretario'],
        	['descripcion' => 'Vice-Presidente'],
        	['descripcion' => 'Gerente'],
        	['descripcion' => 'Tecnico de Soporte'],
        	['descripcion' => 'Programador'],
        	['descripcion' => 'Especialista'],
        	['descripcion' => 'Profesor'],
        	['descripcion' => 'Maestro'],
        	['descripcion' => 'Supervisor'],
        	['descripcion' => 'Asistente'],
        	['descripcion' => 'Presidente']
        ]);
    }
}
