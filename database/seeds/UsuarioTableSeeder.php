<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
        	'cedula' => 25987558,
        	'clave' => password_hash('12345', PASSWORD_DEFAULT),
        	'estatus' => 1,
        	'fecha_creacion' => date('Y-m-d'),
        	'nombres' => 'Isaias Alejandro',
        	'apellido' => 'Dominguez Ramirez',
        	'login' => 'isaias21',
        	'id_tipo_usuario' => 1
        ]);

        DB::table('usuarios')->insert([
        	'cedula' => 25987559,
        	'clave' => password_hash('12345', PASSWORD_DEFAULT),
        	'estatus' => 0,
        	'fecha_creacion' => date('Y-m-d'),
        	'nombres' => 'Isaias Alejandro',
        	'apellido' => 'Dominguez Ramirez',
        	'login' => 'isaias12',
        	'id_tipo_usuario' => 2
        ]);
    }
}
