<?php

use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado')->insert([
        	['descripcion' => 'Desconocido', 'codigo' => 'D'],
            ['descripcion' => 'Distrito Capital', 'codigo' => 'DC'],
        	['descripcion' => 'Aragua', 'codigo' => 'AR'],
        	['descripcion' => 'Valencia', 'codigo' => 'VA'],
        	['descripcion' => 'Tachira', 'codigo' => 'TA'],
        	['descripcion' => 'Bolivar', 'codigo' => 'BO'],
        	['descripcion' => 'Coro', 'codigo' => 'CO'],
        	['descripcion' => 'Vargas', 'codigo' => 'VAR']
        ]);
    }
}
