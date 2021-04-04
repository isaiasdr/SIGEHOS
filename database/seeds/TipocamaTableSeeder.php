<?php

use Illuminate\Database\Seeder;

class TipocamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_cama')->insert([
        	['descripcion' => 'Tipo Cama 1', 'codigo' => 'T1'],
        	['descripcion' => 'Tipo Cama 2', 'codigo' => 'T2'],
        	['descripcion' => 'Tipo Cama 3', 'codigo' => 'T3'],
        	['descripcion' => 'Tipo Cama 4', 'codigo' => 'T4'],
        	['descripcion' => 'Tipo Cama 5', 'codigo' => 'T5'],
        	['descripcion' => 'Tipo Cama 6', 'codigo' => 'T6'],
        	['descripcion' => 'Tipo Cama 7', 'codigo' => 'T7'],
        	['descripcion' => 'Tipo Cama 8', 'codigo' => 'T8']
        ]);
    }
}
