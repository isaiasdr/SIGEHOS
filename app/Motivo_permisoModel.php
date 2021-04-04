<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo_permisoModel extends Model
{
    protected $table = 'motivo_permiso';
    protected $primaryKey= 'id_motivo_permiso';
    public $timestamps= false;

    static public function consultaMotivosPermiso()
    {
    	return Motivo_permisoModel::all();
    }
}
