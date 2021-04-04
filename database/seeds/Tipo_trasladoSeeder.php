<?php

use Illuminate\Database\Seeder;

class Tipo_trasladoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_traslado')->insert([
        	['descripcion' => 'TRASLADO AL MISMO SERVICIO', 'codigo' => 'T1'],
        	['descripcion' => 'TRASLADO A OTRO SERVICIO', 'codigo' => 'T2']
        ]);
    }
}
