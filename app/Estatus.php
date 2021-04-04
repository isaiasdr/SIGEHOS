<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    protected $table = 'estatus';
    protected $primaryKey= 'id_estatus';
    public $timestamps= false;
    
    /*
	public function ()
    {
    	return $this->hasMany('App\Paciente', 'id_estatus', 'id_estatus');
    }	
    */

    static public function consultaEstatus()
    {
    	return Estatus::all();
    }
}
