<?php

use Illuminate\Database\Seeder;

class Edo_civilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edo_civil')->insert([
            ['descripcion' => 'S - Soltero'],
        	['descripcion' => 'C - Casado'],
        	['descripcion' => 'V - Viudo'],
        	['descripcion' => 'D - Divorciado']
        ]);
    }
}
