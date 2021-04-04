<?php

use Illuminate\Database\Seeder;

class Estatus_pacienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estatus_paciente')->insert([
        	['cod_estatus' => 'EP-01', 'descripcion' => 'Admitido', 'origen' => 'No se'],
        	['cod_estatus' => 'EP-02', 'descripcion' => 'Egresado', 'origen' => 'No se'],
        	['cod_estatus' => 'EP-03', 'descripcion' => 'Permiso Medico', 'origen' => 'No se'],
        	['cod_estatus' => 'EP-04', 'descripcion' => 'Defuncion', 'origen' => 'No se']
        ]);
    }
}
