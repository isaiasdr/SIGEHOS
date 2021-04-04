<?php

use Illuminate\Database\Seeder;

class MedicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medico')->insert([
        	['apellidos' => 'Sanchez Rangel', 'atencion_dom' => true, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => true, 'cedula' => 7312093, 'nac' => 'COD-93218391123', 'nombres' => 'Andres Alejo', 'sexo' => 'M', 'trato_medico' => true, 'turno' => 'M', 'id_cargo_medico' => 1, 'id_estatus' => 8, 'id_servicio' => 8, 'id_subespecialidad' => 1],
        	['apellidos' => 'Perez Mujica', 'atencion_dom' => false, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => false, 'cedula' => 8122103, 'nac' => 'COD-32018290128', 'nombres' => 'Pedro Pablo', 'sexo' => 'M', 'trato_medico' => false, 'turno' => 'T', 'id_cargo_medico' => 2, 'id_estatus' => 8, 'id_servicio' => 8, 'id_subespecialidad' => 2],
        	['apellidos' => 'Dominguez Ramirez', 'atencion_dom' => true, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => true, 'cedula' => '31928323', 'nac' => 'COD-48921839259', 'nombres' => 'Ibrahim Antonio', 'sexo' => 'M', 'trato_medico' => true, 'turno' => 'N', 'id_cargo_medico' => 3, 'id_estatus' => 8, 'id_servicio' => 6, 'id_subespecialidad' => 3],
        	['apellidos' => 'Camejo Rujano', 'atencion_dom' => true, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => true, 'cedula' => 8329137, 'nac' => 'COD-97432648520', 'nombres' => 'Maria del Carmen', 'sexo' => 'F', 'trato_medico' => true, 'turno' => 'N', 'id_cargo_medico' => 4, 'id_estatus' => 8, 'id_servicio' => 12, 'id_subespecialidad' => 4],
        	['apellidos' => 'Gonzales', 'atencion_dom' => true, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => true, 'cedula' => 21393234, 'nac' => 'COD-83921834312', 'nombres' => 'Maria Fernanda', 'sexo' => 'F', 'trato_medico' => false, 'turno' => 'M', 'id_cargo_medico' => 5, 'id_estatus' => 8, 'id_servicio' => 14, 'id_subespecialidad' => 5],
        	['apellidos' => 'Mendez Gutierrez', 'atencion_dom' => false, 'atencion_lun' => true, 'atencion_mar' => false, 'atencion_mie' => true, 'atencion_jue' => false, 'atencion_vie' => true, 'atencion_sab' => false, 'cedula' => 4921312, 'nac' => 'COD-98312371273', 'nombres' => 'Javier', 'sexo' => 'M', 'trato_medico' => true, 'turno' => 'N', 'id_cargo_medico' => 6, 'id_estatus' => 8, 'id_servicio' => 13, 'id_subespecialidad' => 6],
        	['apellidos' => 'Mendoza', 'atencion_dom' => true, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => true, 'cedula' => 23178212, 'nac' => 'COD-89148712480', 'nombres' => 'Natalia', 'sexo' => 'F', 'trato_medico' => true, 'turno' => 'T', 'id_cargo_medico' => 7, 'id_estatus' => 8, 'id_servicio' => 8, 'id_subespecialidad' => 7],
        	['apellidos' => 'Navarro', 'atencion_dom' => true, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => true, 'cedula' => 8331381, 'nac' => 'COD-87874112345', 'nombres' => 'Helena', 'sexo' => 'F', 'trato_medico' => true, 'turno' => 'N', 'id_cargo_medico' => 8, 'id_estatus' => 8, 'id_servicio' => 12, 'id_subespecialidad' => 8],
        	['apellidos' => 'Quintana', 'atencion_dom' => true, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => true, 'cedula' => 10531421, 'nac' => 'COD-98491489127', 'nombres' => 'Francisco', 'sexo' => 'M', 'trato_medico' => true, 'turno' => 'M', 'id_cargo_medico' => 9, 'id_estatus' => 8, 'id_servicio' => 8, 'id_subespecialidad' => 9],
        	['apellidos' => 'Colmenarez Serrano', 'atencion_dom' => true, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => true, 'cedula' => 5193291, 'nac' => 'COD-21498948214', 'nombres' => 'Tomas Daniel', 'sexo' => 'M', 'trato_medico' => false, 'turno' => 'T', 'id_cargo_medico' => 1, 'id_estatus' => 9, 'id_servicio' => 13, 'id_subespecialidad' => 10],
        	['apellidos' => 'Alvaraz', 'atencion_dom' => true, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => true, 'cedula' => 14213214, 'nac' => 'COD-18834818473', 'nombres' => 'Patricia', 'sexo' => 'F', 'trato_medico' => false, 'turno' => 'N', 'id_cargo_medico' => 2, 'id_estatus' => 9, 'id_servicio' => 9, 'id_subespecialidad' => 11],
            ['apellidos' => 'Dominguez Ramirez', 'atencion_dom' => true, 'atencion_lun' => true, 'atencion_mar' => true, 'atencion_mie' => true, 'atencion_jue' => true, 'atencion_vie' => true, 'atencion_sab' => true, 'cedula' => 31931431, 'nac' => 'COD-99121232123', 'nombres' => 'Isaac Alonso', 'sexo' => 'M', 'trato_medico' => false, 'turno' => 'M', 'id_cargo_medico' => 2, 'id_estatus' => 8, 'id_servicio' => 3, 'id_subespecialidad' => 9],
        ]);
    }
}
