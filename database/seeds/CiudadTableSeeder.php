<?php

use Illuminate\Database\Seeder;

class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudad')->insert([
        	['descripcion' => 'Caracas', 'estado' => 'Distrito Capital'],
        	['descripcion' => 'Maracay', 'estado' => 'Aragua'],
        	['descripcion' => 'Valencia', 'estado' => 'Carabobo'],
        	['descripcion' => 'San Cristobal', 'estado' => 'Tachira'],
        	['descripcion' => 'Ciudad Bolivar', 'estado' => 'Bolivar']
        ]);
    }
}
