<?php

use Illuminate\Database\Seeder;

class ProfesionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profesion')->insert([
            ['descripcion' => 'Desconocido'],
            ['descripcion' => 'Arquitecto'],
        	['descripcion' => 'Albañil'],
        	['descripcion' => 'Ingeniero'],
        	['descripcion' => 'Profesor'],
        	['descripcion' => 'Maestro'],
        	['descripcion' => 'Pediatra'],
        	['descripcion' => 'Medico'],
        	['descripcion' => 'Bombero'],
        	['descripcion' => 'Policia'],
        	['descripcion' => 'Enfermero'],
        	['descripcion' => 'Panadero']
        ]);
    }
}
