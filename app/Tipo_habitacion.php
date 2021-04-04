<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_habitacion extends Model
{
    protected $table = 'tipo_habitacion';
    protected $primaryKey = 'id_tipo_habitacion';
    public $timestamps= false;

    static public function consulta_tipo_habitaciones($codigo= null, $descripcion= null)
    {
    	if ($codigo && $descripcion) {
    		return Tipo_habitacion::where([
    			['codigo', 'like', '%'.$codigo.'%'],
    			['descripcion', 'like', '%'.$descripcion.'%']
    		])->get();
    	} elseif ($codigo) {
    		return Tipo_habitacion::where('codigo', 'like', '%'.$codigo.'%')->get();
    	} elseif ($descripcion) {
    		return Tipo_habitacion::where('descripcion', 'like', '%'.$descripcion.'%')->get();
    	} else {
    		return Tipo_habitacion::all();
    	}
    }
}
