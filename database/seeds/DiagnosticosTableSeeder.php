<?php

use Illuminate\Database\Seeder;

class DiagnosticosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diagnostico')->insert([
        	['cod_diagnostico' => '01', 'descripcion' => 'CIERTAS ENFERMEDADES INFECCIOSAS Y PARASITARIAS', 'denunciable' => null, 'cod_morbilidad' => null, 'codificable' => null],
        	['cod_diagnostico' => '0101', 'descripcion' => 'ENFERMEDADES INFECCIOSAS INTESTINALES', 'denunciable' => null, 'cod_morbilidad' => null, 'codificable' => null],
        	['cod_diagnostico' => '0101A00', 'descripcion' => 'COLERA', 'denunciable' => null, 'cod_morbilidad' => 1, 'codificable' => null],
        	['cod_diagnostico' => '0101A00.0', 'descripcion' => 'COLERA DEBIDO A VIBRIO CHOLERAE O1, BIOTIPO CHOLERAE', 'denunciable' => 'S', 'cod_morbilidad' => null, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A00.1', 'descripcion' => 'COLERA DEBIDO A VIBRIO CHOLERAE O1, BIOTIPO EL TOR', 'denunciable' => 'S', 'cod_morbilidad' => 1, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A00.9', 'descripcion' => 'COLERA, NO ESPECIFICADA', 'denunciable' => 'S', 'cod_morbilidad' => 1, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A01', 'descripcion' => 'FIEBRE TIFOIDEA Y PARATIFOIDEA', 'denunciable' => null, 'cod_morbilidad' => 2, 'codificable' => null],
        	['cod_diagnostico' => '0101A01.0', 'descripcion' => 'FIEBRE TIFOIDEA', 'denunciable' => 'S', 'cod_morbilidad' => null, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A01.1', 'descripcion' => 'FIEBRE PARATIFOIDEA A', 'denunciable' => 'S', 'cod_morbilidad' => 2, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A01.2', 'descripcion' => 'FIEBRE PARATIFOIDEA B', 'denunciable' => 'S', 'cod_morbilidad' => 2, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A01.3', 'descripcion' => 'FIEBRE PARATIFOIDEA C', 'denunciable' => 'S', 'cod_morbilidad' => 2, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A01.4', 'descripcion' => 'FIEBRE PARATIFOIDEA, NO ESPECIFICADA', 'denunciable' => 'S', 'cod_morbilidad' => 2, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A02', 'descripcion' => 'OTRAS INFECCIONES DEBIDAS A SALMONELLA', 'denunciable' => null, 'cod_morbilidad' => 6, 'codificable' => null],
        	['cod_diagnostico' => '0101A02.0', 'descripcion' => 'ENTERITIS DEBIDA  A SALMONELLA', 'denunciable' => 'S', 'cod_morbilidad' => 6, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A02.1', 'descripcion' => 'SEPTICEMIA DEBIDA A SALMONELLA', 'denunciable' => 'S', 'cod_morbilidad' => 6, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A02.2+', 'descripcion' => 'INFECCIONES LOCALIZADAS DEBIDAS A SALMONELLA', 'denunciable' => 'S', 'cod_morbilidad' => 6, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A02.8', 'descripcion' => 'OTRAS INFECCIONES ESPECIFICADAS COMO DEBIDAS A SALMONELLA', 'denunciable' => 'S', 'cod_morbilidad' => 6, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A02.9', 'descripcion' => 'INFECCION DEBIDA A SALMONELLA, NO ESPECIFICADAS', 'denunciable' => 'S', 'cod_morbilidad' => 6, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A03', 'descripcion' => 'SHIGELOSIS', 'denunciable' => null, 'cod_morbilidad' => 3, 'codificable' => null],
        	['cod_diagnostico' => '0101A03.0', 'descripcion' => 'SHIGELOSIS DEBIDA A SHIGELLA DYSENTERIAE', 'denunciable' => null, 'cod_morbilidad' => 3, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A03.1', 'descripcion' => 'SHIGELOSIS DEBIDA A SHIGELLA FLEXNERI', 'denunciable' => null, 'cod_morbilidad' => 3, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A03.2', 'descripcion' => 'SHIGELOSIS DEBIDA A SHIGELLA BOYDII', 'denunciable' => null, 'cod_morbilidad' => 3, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A03.3', 'descripcion' => 'SHIGELOSIS DEBIDA A SHIGELLA SONNEI', 'denunciable' => null, 'cod_morbilidad' => 3, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A03.8', 'descripcion' => 'OTRAS SHIGELOSIS', 'denunciable' => null, 'cod_morbilidad' => 3, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A03.9', 'descripcion' => 'SHIGELOSIS DE TIPO NO ESPECIFICADO', 'denunciable' => null, 'cod_morbilidad' => 3, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A04', 'descripcion' => 'OTRAS INFECCIONES INTESTINALES BACTERIANAS', 'denunciable' => null, 'cod_morbilidad' => 6, 'codificable' => null],
        	['cod_diagnostico' => '0101A04.0', 'descripcion' => 'INFECCION DEBIDA  A ESCHERICHIA COLI ENTEROPATOGENA', 'denunciable' => null, 'cod_morbilidad' => 6, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A04.1', 'descripcion' => 'INFECCION DEBIDA A ESCHERICHIA COLI ENTEROTOXIGENA', 'denunciable' => null, 'cod_morbilidad' => 6, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A04.2', 'descripcion' => 'INFECCION DEBIDA A ESCHERICHIA COLI ENTEROINVASIVA', 'denunciable' => null, 'cod_morbilidad' => 6, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A04.3', 'descripcion' => 'INFECCION DEBIDA A ESCHERICHIA COLI ENTEROHEMORRAGICA', 'denunciable' => null, 'cod_morbilidad' => 6, 'codificable' => 'S'],
        	['cod_diagnostico' => '0101A04.4', 'descripcion' => 'OTRAS INFECCIONES INTESTINALES DEBIDAS A ESCHERICHIA COLI ', 'denunciable' => null, 'cod_morbilidad' => 6, 'codificable' => 'S'],
        ]);
    }
}
