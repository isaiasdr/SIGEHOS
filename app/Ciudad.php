<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';
    protected $primaryKey= 'id_ciudad';
    public $timestamps= false;
    
    /*
	public function ()
    {
    	return $this->hasMany('App\Paciente', 'id_ciudad', 'id_ciudad');
    }	
    */

    static public function consultaCiudades()
    {
    	return Ciudad::all();
    }
}
