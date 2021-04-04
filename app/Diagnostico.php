<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = 'diagnostico';
    protected $primaryKey= 'id_diagnostico';
    public $timestamps= false;

    static public function consultar_diagnosticos($diagnostico = null, $codigo = null)
    {
    	$query = Diagnostico::select('id_diagnostico', 'descripcion', 'cod_diagnostico');

    	if ($diagnostico) 
            $query->where('descripcion', 'like', '%'.$diagnostico.'%');
        if ($codigo)
            $query->where('cod_diagnostico', 'like', '%'.$codigo.'%');
    	
    	return $query->get();
    }
}
