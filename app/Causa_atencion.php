<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Causa_atencion extends Model
{
    protected $table = 'causa_atencion';
    protected $primaryKey= 'id_causa_atencion';
    public $timestamps= false;

    static public function consulta_causas_atencion()
    {
    	return Causa_atencion::all();
    }
}
