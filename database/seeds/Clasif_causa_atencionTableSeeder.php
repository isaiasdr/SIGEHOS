<?php

use Illuminate\Database\Seeder;

class Clasif_causa_atencionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasif_causa_atencion')->insert([
        	['descripcion' => 'Clasificacion 01', 'cod_clasificacion' => 'CL-01', 'id_causa_atencion' => 1],
        	['descripcion' => 'Clasificacion 02', 'cod_clasificacion' => 'CL-02', 'id_causa_atencion' => 1],
        	['descripcion' => 'Clasificacion 03', 'cod_clasificacion' => 'CL-03', 'id_causa_atencion' => 1],
        	['descripcion' => 'Clasificacion 04', 'cod_clasificacion' => 'CL-04', 'id_causa_atencion' => 2],
        	['descripcion' => 'Clasificacion 05', 'cod_clasificacion' => 'CL-05', 'id_causa_atencion' => 2],
        	['descripcion' => 'Clasificacion 06', 'cod_clasificacion' => 'CL-06', 'id_causa_atencion' => 2],
        	['descripcion' => 'Clasificacion 07', 'cod_clasificacion' => 'CL-07', 'id_causa_atencion' => 3],
        	['descripcion' => 'Clasificacion 08', 'cod_clasificacion' => 'CL-08', 'id_causa_atencion' => 3],
        	['descripcion' => 'Clasificacion 09', 'cod_clasificacion' => 'CL-09', 'id_causa_atencion' => 3],
        	['descripcion' => 'Clasificacion 10', 'cod_clasificacion' => 'CL-10', 'id_causa_atencion' => 4],
        	['descripcion' => 'Clasificacion 11', 'cod_clasificacion' => 'CL-11', 'id_causa_atencion' => 4],
        	['descripcion' => 'Clasificacion 12', 'cod_clasificacion' => 'CL-12', 'id_causa_atencion' => 4],
        	['descripcion' => 'Clasificacion 13', 'cod_clasificacion' => 'CL-13', 'id_causa_atencion' => 5],
        	['descripcion' => 'Clasificacion 14', 'cod_clasificacion' => 'CL-14', 'id_causa_atencion' => 5],
        	['descripcion' => 'Clasificacion 15', 'cod_clasificacion' => 'CL-15', 'id_causa_atencion' => 5],
        	['descripcion' => 'Clasificacion 16', 'cod_clasificacion' => 'CL-16', 'id_causa_atencion' => 6],
        	['descripcion' => 'Clasificacion 17', 'cod_clasificacion' => 'CL-17', 'id_causa_atencion' => 6],
        	['descripcion' => 'Clasificacion 18', 'cod_clasificacion' => 'CL-18', 'id_causa_atencion' => 6],
        	['descripcion' => 'Clasificacion 19', 'cod_clasificacion' => 'CL-19', 'id_causa_atencion' => 7],
        	['descripcion' => 'Clasificacion 20', 'cod_clasificacion' => 'CL-20', 'id_causa_atencion' => 7],
        	['descripcion' => 'Clasificacion 21', 'cod_clasificacion' => 'CL-21', 'id_causa_atencion' => 7],
        	['descripcion' => 'Clasificacion 22', 'cod_clasificacion' => 'CL-22', 'id_causa_atencion' => 8],
        	['descripcion' => 'Clasificacion 23', 'cod_clasificacion' => 'CL-23', 'id_causa_atencion' => 8],
        	['descripcion' => 'Clasificacion 24', 'cod_clasificacion' => 'CL-24', 'id_causa_atencion' => 8],
        	['descripcion' => 'Clasificacion 25', 'cod_clasificacion' => 'CL-25', 'id_causa_atencion' => 9],
        	['descripcion' => 'Clasificacion 26', 'cod_clasificacion' => 'CL-26', 'id_causa_atencion' => 9],
        	['descripcion' => 'Clasificacion 27', 'cod_clasificacion' => 'CL-27', 'id_causa_atencion' => 9],
        	['descripcion' => 'Clasificacion 28', 'cod_clasificacion' => 'CL-28', 'id_causa_atencion' => 10],
        	['descripcion' => 'Clasificacion 29', 'cod_clasificacion' => 'CL-29', 'id_causa_atencion' => 10],
        	['descripcion' => 'Clasificacion 30', 'cod_clasificacion' => 'CL-30', 'id_causa_atencion' => 10],
        	['descripcion' => 'Clasificacion 31', 'cod_clasificacion' => 'CL-31', 'id_causa_atencion' => 11],
        	['descripcion' => 'Clasificacion 32', 'cod_clasificacion' => 'CL-32', 'id_causa_atencion' => 11],
        	['descripcion' => 'Clasificacion 33', 'cod_clasificacion' => 'CL-33', 'id_causa_atencion' => 11],
        ]);
    }
}
