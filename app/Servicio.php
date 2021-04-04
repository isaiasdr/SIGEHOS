<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
    protected $primaryKey= 'id_servicio';
    public $timestamps= false;
    
    static public function consultaServicios($tipo_servicio=null)
    {
    	if ($tipo_servicio) {
    		return Servicio::select('servicio.*')->join('tipo_servicio', 'servicio.id_tipo_servicio', '=', 'tipo_servicio.id_tipo_servicio')
    						->where('tipo_servicio.descripcion', $tipo_servicio)->get();
    	} else {
    		return Servicio::select('servicio.*', 'tipo_servicio.descripcion as tipo_servicio')->join('tipo_servicio', 'servicio.id_tipo_servicio', '=', 'tipo_servicio.id_tipo_servicio')->get();
    	}
    }
}
