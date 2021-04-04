<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $table = 'parentesco';
    protected $primaryKey= 'id_parentesco';
    public $timestamps= false;
    
    /*
	public function ()
    {
    	return $this->hasMany('App\Paciente', 'id_parentesco', 'id_parentesco');
    }	
    */

    static public function consultaParentescos()
    {
    	return Parentesco::all();
    }
}
