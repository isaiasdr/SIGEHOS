<?php

use Illuminate\Database\Seeder;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religion')->insert([
            ['descripcion' => 'Desconocido'],
            ['descripcion' => 'Catolico'],
        	['descripcion' => 'Evangelico'],
        	['descripcion' => 'Santero'],
        	['descripcion' => 'Testigo de Jehova'],
        	['descripcion' => 'Cristiano']
        ]);
    }
}
