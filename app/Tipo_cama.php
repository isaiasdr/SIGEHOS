<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_cama extends Model
{
    protected $table = 'tipo_cama';
    protected $primaryKey = 'id_tipo_cama';
    public $timestamps= false;

    static public function consulta_tipo_camas($codigo= null, $descripcion= null)
    {
    	if ($codigo && $descripcion) {
    		return Tipo_cama::where([
    			['codigo', 'like', '%'.$codigo.'%'],
    			['descripcion', 'like', '%'.$descripcion.'%']
    		])->get();
    	} elseif ($codigo) {
    		return Tipo_cama::where('codigo', 'like', '%'.$codigo.'%')->get();
    	} elseif ($descripcion) {
    		return Tipo_cama::where('descripcion', 'like', '%'.$descripcion.'%')->get();
    	} else {
    		return Tipo_cama::all();
    	}
    }
}
