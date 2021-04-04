<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
	protected $table = 'referencia';
    protected $primaryKey= 'id_referencia';
    public $timestamps= false;
    
    static public function consultarReferencias()
    {
    	return Referencia::all();
    }
}
