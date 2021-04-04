<?php

use Illuminate\Database\Seeder;

class Causa_egresoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('causa_egreso')->insert([
        	['codigo' => 'CE-01', 'descripcion' => 'No Egresado', 'tipo_alta' => 'No esta de alta'],
        	['codigo' => 'CE-02', 'descripcion' => 'Mejoria', 'tipo_alta' => 'Alta Medica'],
        	['codigo' => 'CE-03', 'descripcion' => 'Contraopinion Medica', 'tipo_alta' => 'Alta No Medica'],
        	['codigo' => 'CE-04', 'descripcion' => 'Defuncion', 'tipo_alta' => 'Alta Medica']
        ]);
    }
}
