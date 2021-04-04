<?php

use Illuminate\Database\Seeder;

class ZonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zona')->insert([
            ['zona' => 'Desconocido', 'id_distrito' => 2, 'id_estado' => 1],
            ['zona' => 'El valle', 'id_distrito' => 1, 'id_estado' => 2],
        	['zona' => 'Bello Monte', 'id_distrito' => 1, 'id_estado' => 2],
        	['zona' => 'Coche', 'id_distrito' => 1, 'id_estado' => 2],
        	['zona' => 'La Bandera', 'id_distrito' => 1, 'id_estado' => 2],
        	['zona' => 'El limon', 'id_distrito' => 2, 'id_estado' => 3],
        	['zona' => 'San Mateo', 'id_distrito' => 2, 'id_estado' => 3],
        	['zona' => 'Maracay', 'id_distrito' => 2, 'id_estado' => 3],
        	['zona' => 'Palo Negro', 'id_distrito' => 2, 'id_estado' => 3],
        	['zona' => 'San Jose', 'id_distrito' => 2, 'id_estado' => 4],
        	['zona' => 'Candelaria', 'id_distrito' => 2, 'id_estado' => 4],
        	['zona' => 'Catedral', 'id_distrito' => 2, 'id_estado' => 4],
        	['zona' => 'Rafael Urdaneta', 'id_distrito' => 2, 'id_estado' => 4],
        	['zona' => 'Cordero', 'id_distrito' => 2, 'id_estado' => 5],
        	['zona' => 'Las mesas', 'id_distrito' => 2, 'id_estado' => 5],
        	['zona' => 'San Antonio', 'id_distrito' => 2, 'id_estado' => 5],
        	['zona' => 'La grita', 'id_distrito' => 2, 'id_estado' => 5],
        	['zona' => 'Ciudad Guayana', 'id_distrito' => 2, 'id_estado' => 6],
        	['zona' => 'Ciudad Bolivar', 'id_distrito' => 2, 'id_estado' => 6],
        	['zona' => 'El Dorado', 'id_distrito' => 2, 'id_estado' => 6],
        	['zona' => 'Tumeremo', 'id_distrito' => 2, 'id_estado' => 6],
        	['zona' => 'Coro', 'id_distrito' => 2, 'id_estado' => 7],
        	['zona' => 'La Guaira', 'id_distrito' => 2, 'id_estado' => 8],
        	['zona' => 'Macuto', 'id_distrito' => 2, 'id_estado' => 8],
        	['zona' => 'Maiquetia', 'id_distrito' => 2, 'id_estado' => 8],
        	['zona' => 'Naiguata', 'id_distrito' => 2, 'id_estado' => 8]
        ]);
    }
}
