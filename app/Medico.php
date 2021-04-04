<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medico';
    protected $primaryKey= 'id_medico';
    public $timestamps= false;

    static public function consultar_medicos_servicio($id_servicio)
    {
    	return  DB::table('medico')
    				->join('servicio', 'medico.id_servicio', '=', 'servicio.id_servicio')
    				->join('subespecialidad', 'medico.id_subespecialidad', '=', 'subespecialidad.id_subespecialidad')
    				->join('cargo_medico', 'medico.id_cargo_medico', '=', 'cargo_medico.id_cargo_medico')
    				->select('medico.cedula', 'medico.apellidos', 'medico.nombres', 'servicio.descripcion as servicio', 'subespecialidad.descripcion as subespecialidad', 'cargo_medico.descripcion as cargo')
    				->where('medico.id_servicio', $id_servicio)->get();
    }
}
