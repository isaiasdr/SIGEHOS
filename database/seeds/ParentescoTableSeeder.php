<?php

use Illuminate\Database\Seeder;

class ParentescoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parentesco')->insert([
        	['descripcion' => 'Padre'],
        	['descripcion' => 'Madre'],
        	['descripcion' => 'Hermano'],
        	['descripcion' => 'Hermana'],
        	['descripcion' => 'Tia'],
        	['descripcion' => 'Tio'],
        	['descripcion' => 'Abuela'],
        	['descripcion' => 'Abuelo']
        ]);
    }
}
