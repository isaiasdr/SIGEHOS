<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'zona';
    protected $primaryKey= 'id_zona';
    public $timestamps= false;
    
    /*
	public function ()
    {
    	return $this->hasMany('App\Paciente', 'id_zona', 'id_zona');
    }	
    */

    static public function consultaZonas()
    {
    	return Zona::all();
    }
}
