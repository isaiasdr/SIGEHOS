<?php

use Illuminate\Database\Seeder;

class DistritoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('distrito')->insert([
        	['descripcion' => 'Distrito Capital', 'codigo' => 'DC'],
        	['descripcion' => 'null', 'codigo' => 'NU']
        ]);
    }
}
