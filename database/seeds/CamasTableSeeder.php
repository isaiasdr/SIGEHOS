<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CamasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date= Carbon::now();

        DB::table('cama')->insert([
        	['codigo_cama' => '300F1', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'H', 'id_habitacion' => 1, 'id_tipo_cama' => 1, 'id_motivo_mant_cama' => 1],
        	['codigo_cama' => '3019A', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'H', 'id_habitacion' => 1, 'id_tipo_cama' => 2, 'id_motivo_mant_cama' => 1],
        	['codigo_cama' => '3019B', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'H', 'id_habitacion' => 1, 'id_tipo_cama' => 3, 'id_motivo_mant_cama' => 3],
        	['codigo_cama' => '3019C', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'H', 'id_habitacion' => 2, 'id_tipo_cama' => 4, 'id_motivo_mant_cama' => 3],
        	['codigo_cama' => '3019D', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'H', 'id_habitacion' => 2, 'id_tipo_cama' => 4, 'id_motivo_mant_cama' => 4],
        	['codigo_cama' => '3019E', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'H', 'id_habitacion' => 3, 'id_tipo_cama' => 5, 'id_motivo_mant_cama' => 6],
        	['codigo_cama' => '3019F', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'E', 'id_habitacion' => 3, 'id_tipo_cama' => 5, 'id_motivo_mant_cama' => 5],
        	['codigo_cama' => '3019H', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'E', 'id_habitacion' => 4, 'id_tipo_cama' => 6, 'id_motivo_mant_cama' => 6],
        	['codigo_cama' => '3019I', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'E', 'id_habitacion' => 5, 'id_tipo_cama' => 7, 'id_motivo_mant_cama' => 7],
        	['codigo_cama' => '3019J', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'E', 'id_habitacion' => 5, 'id_tipo_cama' => 7, 'id_motivo_mant_cama' => 8],
        	['codigo_cama' => '3019K', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'E', 'id_habitacion' => 6, 'id_tipo_cama' => 8, 'id_motivo_mant_cama' => 9],
        	['codigo_cama' => '3019L', 'estatus' => 'DISPONIBLE', 'fecha_estatus' => $date->toDateTimeString(), 'tipo_ingreso' => 'E', 'id_habitacion' => 7, 'id_tipo_cama' => 8, 'id_motivo_mant_cama' => 10],
        ]);
    }
}
