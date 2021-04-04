<?php

use Illuminate\Database\Seeder;

class Causa_atencionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('causa_atencion')->insert([
        	['descripcion' => 'Dolor Abdominal', 'cod_causa_atencion' => 'DA-01'],
        	['descripcion' => 'Dolor Lumbar', 'cod_causa_atencion' => 'DL-01'],
        	['descripcion' => 'Molestias Estomago', 'cod_causa_atencion' => 'ME-01'],
        	['descripcion' => 'Molestias Garganta', 'cod_causa_atencion' => 'MG-01'],
        	['descripcion' => 'Fiebre Constante', 'cod_causa_atencion' => 'FC-01'],
        	['descripcion' => 'Fractura en Brazo', 'cod_causa_atencion' => 'FB-01'],
        	['descripcion' => 'Fractura en Pierna', 'cod_causa_atencion' => 'FP-01'],
        	['descripcion' => 'Fractura Costilla', 'cod_causa_atencion' => 'FC-01'],
        	['descripcion' => 'Arromiento', 'cod_causa_atencion' => 'AR-01'],
        	['descripcion' => 'Heridas de Bala', 'cod_causa_atencion' => 'HB-01'],
        	['descripcion' => 'Daño Craneal', 'cod_causa_atencion' => 'DC-01'],
        ]);
    }
}
