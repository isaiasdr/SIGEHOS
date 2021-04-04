<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edo_civil extends Model
{
    protected $table = 'edo_civil';
    protected $primaryKey= 'id_edo_civil';
    public $timestamps= false;
    
    /*
	public function ()
    {
    	return $this->hasMany('App\Paciente', 'id_edo_civil', 'id_edo_civil');
    }	
    */

    static public function consultaEstadosCiviles()
    {
    	return Edo_civil::all();
    }
}
