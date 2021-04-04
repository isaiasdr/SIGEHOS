<?php

use Illuminate\Database\Seeder;

class MotivoMantCamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motivo_mant_cama')->insert([
        	['descripcion' => 'Motivo 1', 'codigo' => 'C1'],
        	['descripcion' => 'Motivo 2', 'codigo' => 'C2'],
        	['descripcion' => 'Motivo 3', 'codigo' => 'C3'],
        	['descripcion' => 'Motivo 4', 'codigo' => 'C4'],
        	['descripcion' => 'Motivo 5', 'codigo' => 'C5'],
        	['descripcion' => 'Motivo 6', 'codigo' => 'C6'],
        	['descripcion' => 'Motivo 7', 'codigo' => 'C7'],
        	['descripcion' => 'Motivo 8', 'codigo' => 'C8'],
        	['descripcion' => 'Motivo 9', 'codigo' => 'C9'],
        	['descripcion' => 'Motivo 10', 'codigo' => 'C10'],
        	['descripcion' => 'Motivo 11', 'codigo' => 'C11'],
        ]);
    }
}
