<?php

use Illuminate\Database\Seeder;

class SubespecialidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subespecialidad')->insert([
        	['descripcion' => 'Cardiologia', 'codigo' => 1, 'piso' => 3, 'id_estatus' => 8, 'id_servicio' => 8],
        	['descripcion' => 'Cardiologia Pediatrica', 'codigo' => 2, 'piso' => 3, 'id_estatus' => 8, 'id_servicio' => 8],
        	['descripcion' => 'Neumologia Pediatrica', 'codigo' => 3, 'piso' => 3, 'id_estatus' => 8, 'id_servicio' => 6],
        	['descripcion' => 'Neurocirugia', 'codigo' => 4, 'piso' => 4, 'id_estatus' => 8, 'id_servicio' => 12],
        	['descripcion' => 'Urologia', 'codigo' => 5, 'piso' => 5, 'id_estatus' => 8, 'id_servicio' => 14],
        	['descripcion' => 'Medicina Materno Fetal', 'codigo' => 6, 'piso' => 5, 'id_estatus' => 8, 'id_servicio' => 13],
        	['descripcion' => 'Cirugia Cardiotoracica', 'codigo' => 7, 'piso' => 3, 'id_estatus' => 8, 'id_servicio' => 8],
        	['descripcion' => 'Cirugia Oncologica', 'codigo' => 8, 'piso' => 4, 'id_estatus' => 8, 'id_servicio' => 12],
        	['descripcion' => 'Hematologia', 'codigo' => 9, 'piso' => 4, 'id_estatus' => 8, 'id_servicio' => 9],
        	['descripcion' => 'Neonatalogia', 'codigo' => 10, 'piso' => 5, 'id_estatus' => 8, 'id_servicio' => 13],
        	['descripcion' => 'Reumatologia', 'codigo' => 11, 'piso' => 4, 'id_estatus' => 8, 'id_servicio' => 9],
        	['descripcion' => 'Angiologia y Cirugia Vascular', 'codigo' => 12, 'piso' => 4, 'id_estatus' => 8, 'id_servicio' => 12],
        	['descripcion' => 'Cirugia Pediatrica', 'codigo' => 13, 'piso' => 4, 'id_estatus' => 8, 'id_servicio' => 11],
        ]);
    }
}
