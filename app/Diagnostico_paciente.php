<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico_paciente extends Model
{
    protected $table = 'diagnostico_paciente';
    protected $primaryKey= 'id_diagnostico_paciente';
    public $timestamps= false;

    static public function registrarDiagnostico($diagnostico_paciente, $nro_renglon, $id_ingreso, $id_diagnostico)
    {
    	return Diagnostico_paciente::insert([
    		'diagnostico_paciente' => $diagnostico_paciente,
    		'nro_renglon' => $nro_renglon,
    		'id_ingreso' => $id_ingreso,
    		'id_diagnostico' => $id_diagnostico
    	]);
    }

    static public function buscarDiagnosticosPaciente($id_ingreso)
    {
        return Diagnostico_paciente::select('diagnostico.descripcion', 'diagnostico.cod_diagnostico')
                                    ->join('diagnostico', 'diagnostico.id_diagnostico', '=', 'diagnostico_paciente.id_diagnostico')
                                    ->where('diagnostico_paciente.id_ingreso', $id_ingreso)->get();
    }
}
