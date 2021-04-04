<?php

use Illuminate\Database\Seeder;

class EstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estatus')->insert([
        	['descripcion' => 'Admitido'],
        	['descripcion' => 'Internado'],
        	['descripcion' => 'Recuperado'],
        	['descripcion' => 'Hospitalizado'],
        	['descripcion' => 'Permiso'],
            ['descripcion' => 'Servicio Activo'],
            ['descripcion' => 'Servicio Inactivo'],
            ['descripcion' => 'Activo'],
            ['descripcion' => 'Inactivo'],
            ['descripcion' => 'Solicitado'],
            ['descripcion' => 'Aprobado'],
            ['descripcion' => 'Rechazado'],
            ['descripcion' => 'Cancelado']
        ]);
    }
}
