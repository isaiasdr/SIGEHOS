<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Causa_egresoModel extends Model
{
    protected $table = 'causa_egreso';
    protected $primaryKey= 'id_causa_egreso';
    public $timestamps= false;

    static public function consultaCausasEgreso()
    {
    	return Causa_egresoModel::all();
    }
}
