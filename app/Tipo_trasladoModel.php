<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_trasladoModel extends Model
{
    protected $table = 'tipo_traslado';
    protected $primaryKey = 'id_tipo_traslado';
    public $timestamps= false;

    static public function consultaTiposTraslado()
    {
    	return Tipo_trasladoModel::all();
    }
}
