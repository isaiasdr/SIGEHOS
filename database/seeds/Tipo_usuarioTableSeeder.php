<?php

use Illuminate\Database\Seeder;

class Tipo_usuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuario')->insert([
        	['descripcion' => 'Administrador del sistema', 'codigo' => 1, 'tipo' => 'A', 'acceso_total' => true],
            ['descripcion' => 'Usuario basico del sistema', 'codigo' => 2, 'tipo' => 'U', 'acceso_total' => false]
        ]);
    }
}
