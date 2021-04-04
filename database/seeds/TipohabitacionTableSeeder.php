<?php

use Illuminate\Database\Seeder;

class TipohabitacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_habitacion')->insert([
        	['descripcion' => 'AISLAMIENTO INFLUENZA AH1N1', 'codigo' => 'AH', 'id_servicio' => 1],
        	['descripcion' => 'ANEXO NIÑOS', 'codigo' => 'AN', 'id_servicio' => 2],
        	['descripcion' => 'CUIDADOS INTERMEDIOS', 'codigo' => 'CI', 'id_servicio' => 3],
        	['descripcion' => 'CUIDADOS MINIMOS', 'codigo' => 'CM', 'id_servicio' => 4],
        	['descripcion' => 'FLOTANTE AMBULATORIA', 'codigo' => 'FA', 'id_servicio' => 5],
        	['descripcion' => 'FLOT. INCUBADORA CUIDAD. INTENS.', 'codigo' => 'FI', 'id_servicio' => 6],
        	['descripcion' => 'SALA DE MUJERES', 'codigo' => 'FS', 'id_servicio' => 7],
        	['descripcion' => 'SALA GENERAL A', 'codigo' => 'GA', 'id_servicio' => 8],
        	['descripcion' => 'SALA GENERAL B', 'codigo' => 'GB', 'id_servicio' => 9],
        	['descripcion' => 'SALA GENERAL INFANTIL', 'codigo' => 'GI', 'id_servicio' => 10],
        	['descripcion' => 'CUBICULO', 'codigo' => 'HC', 'id_servicio' => 11],
        	['descripcion' => 'SOLO HEMODINAMIA', 'codigo' => 'HE', 'id_servicio' => 12],
        	['descripcion' => 'PRIVADO', 'codigo' => 'HP', 'id_servicio' => 13],
        	['descripcion' => 'CIR. MAXILOFACIAL', 'codigo' => 'MF', 'id_servicio' => 14]
        ]);
    }
}
