<?php

namespace App;
use DB;


use Illuminate\Database\Eloquent\Model;

class Registros_sistema extends Model
{
    protected $table = 'registros_sistema';
    protected $primaryKey= 'id_registro_sistema';
    public $timestamps= false;

    static public function crear_registro($id_user, $descripcion, $fecha, $evento)
    {
    	Registros_sistema::insert([
    		['id_usuario' => $id_user, 'descripcion' => $descripcion, 'fecha_hora' => $fecha, 'id_evento_sistema' => $evento]
    	]);
    }
}
