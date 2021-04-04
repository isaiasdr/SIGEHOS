<?php

use Illuminate\Database\Seeder;

class ServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicio')->insert([
        	['descripcion' => 'Ginecologia', 'apoyo' => 'true', 'piso' => 1, 'puesto' => 'NS', 'tipo' => 'GN', 'id_tipo_servicio' => 1, 'id_departamento' => 1, 'id_estatus' => 6],
        	['descripcion' => 'Salud Mental', 'apoyo' => 'true', 'piso' => 1, 'puesto' => 'NS', 'tipo' => 'SM', 'id_tipo_servicio' => 1, 'id_departamento' => 2, 'id_estatus' => 7],
        	['descripcion' => 'Terapia', 'apoyo' => 'true', 'piso' => 1, 'puesto' => 'NS', 'tipo' => 'TP', 'id_tipo_servicio' => 2, 'id_departamento' => 3, 'id_estatus' => 6],
        	['descripcion' => 'Rehabilitacion', 'apoyo' => 'false', 'piso' => 2, 'puesto' => 'NS', 'tipo' => 'RH', 'id_tipo_servicio' => 2, 'id_departamento' => 3, 'id_estatus' => 6],
        	['descripcion' => 'Psiquiatria', 'apoyo' => 'false', 'piso' => 2, 'puesto' => 'NS', 'tipo' => 'TP', 'id_tipo_servicio' => 3, 'id_departamento' => 3, 'id_estatus' => 7],
        	['descripcion' => 'Pediatria', 'apoyo' => 'true', 'piso' => 3, 'puesto' => 'NS', 'tipo' => 'PD', 'id_tipo_servicio' => 3, 'id_departamento' => 3, 'id_estatus' => 6],
        	['descripcion' => 'Oftalmologia', 'apoyo' => 'true', 'piso' => 3, 'puesto' => 'NS', 'tipo' => 'OF', 'id_tipo_servicio' => 3, 'id_departamento' => 4, 'id_estatus' => 6],
        	['descripcion' => 'Cardiologia', 'apoyo' => 'true', 'piso' => 3, 'puesto' => 'NS', 'tipo' => 'CD', 'id_tipo_servicio' => 1, 'id_departamento' => 5, 'id_estatus' => 6],
        	['descripcion' => 'Inmunizacion', 'apoyo' => 'true', 'piso' => 4, 'puesto' => 'NS', 'tipo' => 'IM', 'id_tipo_servicio' => 2, 'id_departamento' => 6, 'id_estatus' => 6],
        	['descripcion' => 'Psicologia', 'apoyo' => 'true', 'piso' => 4, 'puesto' => 'NS', 'tipo' => 'PL', 'id_tipo_servicio' => 3, 'id_departamento' => 3, 'id_estatus' => 6],
        	['descripcion' => 'Cirugia Pediatrica', 'apoyo' => 'true', 'piso' => 4, 'puesto' => 'NS', 'tipo' => 'CP', 'id_tipo_servicio' => 2, 'id_departamento' => 7, 'id_estatus' => 6],
        	['descripcion' => 'Cirugia General', 'apoyo' => 'true', 'piso' => 4, 'puesto' => 'NS', 'tipo' => 'CG', 'id_tipo_servicio' => 2, 'id_departamento' => 7, 'id_estatus' => 6],
        	['descripcion' => 'Prenatal', 'apoyo' => 'true', 'piso' => 5, 'puesto' => 'NS', 'tipo' => 'PN', 'id_tipo_servicio' => 1, 'id_departamento' => 8, 'id_estatus' => 6],
        	['descripcion' => 'Urologia', 'apoyo' => 'true', 'piso' => 5, 'puesto' => 'NS', 'tipo' => 'UR', 'id_tipo_servicio' => 3, 'id_departamento' => 8, 'id_estatus' => 7]
        ]);
    }
}
