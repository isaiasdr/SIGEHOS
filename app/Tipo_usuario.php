<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_usuario extends Model
{
    protected $table = 'tipo_usuario';
    protected $primaryKey = 'id_tipo_usuario';
    public $timestamps= false;

    /*public function ()
    {
    	return $this->hasMany('App\Usuario', 'id_tipo_usuario', 'id_tipo_usuario');
    }*/
}
