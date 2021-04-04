<?php

use Illuminate\Database\Seeder;

class Tipo_servicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_servicio')->insert([
        	['descripcion' => 'EMER'],
        	['descripcion' => 'HOSP'],
        	['descripcion' => 'CEXT']
        ]);
    }
}
