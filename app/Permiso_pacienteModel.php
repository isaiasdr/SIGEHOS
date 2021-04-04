<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso_pacienteModel extends Model
{
    protected $table = 'permiso_paciente';
    protected $primaryKey = 'id_permiso_paciente';
    public $timestamps = false;

    static public function numeroPermiso($id_ingreso)
    {
    	return Permiso_pacienteModel::where('id_ingreso', $id_ingreso)->orderBy('id_permiso_paciente', 'desc')->first();
    }

    static public function registrarPermiso($id_ingreso, $fecha_reintegro, $motivo_permiso, $num_permiso)
    {

    	Ingreso::where('id_ingreso', $id_ingreso)->update(['id_estatus_paciente' => 3]);

    	return Permiso_pacienteModel::insertGetId([
    		'nro_permiso' => $num_permiso,
    		'fecha_reintegro' => $fecha_reintegro, 
    		'estatus' => 5, 
    		'id_ingreso' => $id_ingreso,
            'id_motivo_permiso' => $motivo_permiso
    	], 'id_permiso_paciente');
    }
}
