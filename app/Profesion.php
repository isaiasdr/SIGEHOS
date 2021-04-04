<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table = 'profesion';
    protected $primaryKey= 'id_profesion';
    public $timestamps= false;
    
    /*
	public function ()
    {
    	return $this->hasMany('App\Paciente', 'id_profesion', 'id_profesion');
    }	
    */

    static public function consultaProfesiones()
    {
    	return Profesion::all();
    }
}
