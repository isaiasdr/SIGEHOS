<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table = 'religion';
    protected $primaryKey= 'id_religion';
    public $timestamps= false;
    
    /*
	public function ()
    {
    	return $this->hasMany('App\Paciente', 'id_religion', 'id_religion');
    }	
    */

    static public function consultaReligiones()
    {
    	return Religion::all();
    }
}
