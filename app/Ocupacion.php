<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    protected $table = 'ocupacion';
    protected $primaryKey= 'id_ocupacion';
    public $timestamps= false;
    
    /*
	public function ()
    {
    	return $this->hasMany('App\Paciente', 'id_ocupacion', 'id_ocupacion');
    }	
    */

    static public function consultaOcupaciones()
    {
    	return Ocupacion::all();
    }
}
