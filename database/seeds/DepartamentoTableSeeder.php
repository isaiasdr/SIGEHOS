<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamento')->insert([
        	['descripcion' => 'departamento 1'],
        	['descripcion' => 'departamento 2'],
        	['descripcion' => 'departamento 3'],
        	['descripcion' => 'departamento 4'],
        	['descripcion' => 'departamento 5'],
        	['descripcion' => 'departamento 6'],
        	['descripcion' => 'departamento 7'],
        	['descripcion' => 'departamento 8']
        ]);
    }
}
