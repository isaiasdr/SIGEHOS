<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dias extends Model
{
    protected $table = 'dias';
    public $timestamps= false;

    static public function consultarDias()
    {
    	return Dias::all();
    }
}
