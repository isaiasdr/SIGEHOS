<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HabitacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date= Carbon::now();

        DB::table('habitacion')->insert([
        	['duracion_fuera' => 3, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 3, 'nro_habitacion' => 1, 'piso' => 1, 'ala' => 1, 'cod_clinica' => 'A1', 'id_servicio' => 1, 'id_tipo_habitacion' => 1],
        	['duracion_fuera' => 3, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 3, 'nro_habitacion' => 2, 'piso' => 1, 'ala' => 2, 'cod_clinica' => 'B2', 'id_servicio' => 1, 'id_tipo_habitacion' => 1],
        	['duracion_fuera' => 3, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 3, 'nro_habitacion' => 3, 'piso' => 1, 'ala' => 3, 'cod_clinica' => 'C3', 'id_servicio' => 1, 'id_tipo_habitacion' => 1],
        	['duracion_fuera' => 4, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 4, 'nro_habitacion' => 4, 'piso' => 2, 'ala' => 1, 'cod_clinica' => 'A4', 'id_servicio' => 2, 'id_tipo_habitacion' => 2],
        	['duracion_fuera' => 4, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 4, 'nro_habitacion' => 5, 'piso' => 2, 'ala' => 2, 'cod_clinica' => 'B5', 'id_servicio' => 2, 'id_tipo_habitacion' => 2],
        	['duracion_fuera' => 4, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 4, 'nro_habitacion' => 6, 'piso' => 2, 'ala' => 3, 'cod_clinica' => 'C6', 'id_servicio' => 2, 'id_tipo_habitacion' => 2],
        	['duracion_fuera' => 5, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 5, 'nro_habitacion' => 7, 'piso' => 3, 'ala' => 1, 'cod_clinica' => 'A7', 'id_servicio' => 3, 'id_tipo_habitacion' => 3],
        	['duracion_fuera' => 5, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 5, 'nro_habitacion' => 8, 'piso' => 3, 'ala' => 2, 'cod_clinica' => 'B8', 'id_servicio' => 3, 'id_tipo_habitacion' => 3],
        	['duracion_fuera' => 5, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 5, 'nro_habitacion' => 9, 'piso' => 3, 'ala' => 3, 'cod_clinica' => 'C9', 'id_servicio' => 3, 'id_tipo_habitacion' => 3],
        	['duracion_fuera' => 6, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 6, 'nro_habitacion' => 10, 'piso' => 4, 'ala' => 1, 'cod_clinica' => 'A10', 'id_servicio' => 4, 'id_tipo_habitacion' => 4],
        	['duracion_fuera' => 6, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 6, 'nro_habitacion' => 11, 'piso' => 4, 'ala' => 2, 'cod_clinica' => 'B11', 'id_servicio' => 4, 'id_tipo_habitacion' => 4],
        	['duracion_fuera' => 6, 'fecha_ult_mant' => $date->toDateTimeString(), 'intervalo_mant' => 6, 'nro_habitacion' => 12, 'piso' => 4, 'ala' => 3, 'cod_clinica' => 'C12', 'id_servicio' => 4, 'id_tipo_habitacion' => 4]
        ]);
    }
}
