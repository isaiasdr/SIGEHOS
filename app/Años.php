<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Años extends Model
{
    protected $table = 'años';
    public $timestamps= false;

    static public function consultarAños()
    {
    	return Años::all();
    }
}
