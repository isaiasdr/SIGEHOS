<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey= 'id_usuario';
    public $timestamps= false;

    public function tipo_usuario()
    {
    	return $this->belongsTo('App\Tipo_usuario', 'id_tipo_usuario', 'id_tipo_usuario');
    }

    static public function searchUser($username)
    {
    	return Usuario::select('clave')->where('login', $username)->first();
    }

    static public function selectPass($username)
    {
    	return Usuario::join('tipo_usuario', 'usuarios.id_tipo_usuario', '=', 'tipo_usuario.id_tipo_usuario')
		    ->select('usuarios.id_usuario', 'usuarios.estatus', 'usuarios.nombres', 'usuarios.apellido', 'tipo_usuario.tipo', 'tipo_usuario.acceso_total')
			->where('login', $username)
			->first();
    }
}
