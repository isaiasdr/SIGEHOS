<?php

use Illuminate\Database\Seeder;

class Motivo_permisoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('motivo_permiso')->insert([
        	['descripcion' => '12H', 'codigo' => 'COD-01'],
        	['descripcion' => '24H', 'codigo' => 'COD-02'],
        	['descripcion' => '48H', 'codigo' => 'COD-03'],
        	['descripcion' => '72H', 'codigo' => 'COD-04'],
        	['descripcion' => 'Fin de Semana', 'codigo' => 'COD-05']
        ]);
    }
}
