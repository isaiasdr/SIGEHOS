<?php

use Illuminate\Database\Seeder;

class ReferenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('referencia')->insert([
        	['descripcion' => 'Sin referencia', 'codigo' => 'RE-01'],
        	['descripcion' => 'Ambulatorio', 'codigo' => 'RE-02'],
        	['descripcion' => 'Servicio Cardiologia', 'codigo' => 'RE-03'],
        	['descripcion' => 'Hospital lusiani', 'codigo' => 'RE-04']
        ]);
    }
}
