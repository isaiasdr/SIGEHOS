<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento_sistema extends Model
{
    protected $table = 'evento_sistema';
    protected $primaryKey= 'id_evento_sistema';
    public $timestamps= false;

    static public function consultarEvento($evento)
    {
    	return Evento_sistema::select('id_evento_sistema')->where('descripcion', $evento)->first();
    }
}
