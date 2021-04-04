<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    protected $table = 'nacionalidad';
    protected $primaryKey= 'id_nacionalidad';
    public $timestamps= false;
    
    /*
	public function ()
    {
    	return $this->hasMany('App\Paciente', 'id_nacionalidad', 'id_nacionalidad');
    }	
    */

    static public function consultaNacionalidades()
    {
    	return Nacionalidad::all();
    }
}
