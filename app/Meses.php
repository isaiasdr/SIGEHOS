<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meses extends Model
{
    protected $table = 'meses';
    public $timestamps= false;

    static public function consultarMeses()
    {
    	return Meses::all();
    }
}
