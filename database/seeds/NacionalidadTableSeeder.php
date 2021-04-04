<?php

use Illuminate\Database\Seeder;

class NacionalidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nacionalidad')->insert([
        	['descripcion' => 'Desconocido'],
            ['descripcion' => 'Venezolano'],
        	['descripcion' => 'Colombiano'],
        	['descripcion' => 'Ecuatoriano'],
        	['descripcion' => 'Peruano'],
        	['descripcion' => 'Brasileño'],
        	['descripcion' => 'Argentino'],
        	['descripcion' => 'Chileno'],
        	['descripcion' => 'Uruguayo'],
        	['descripcion' => 'Mexicano'],
        	['descripcion' => 'Cubano']
        ]);
    }
}
