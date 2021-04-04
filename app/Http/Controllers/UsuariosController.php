<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Tipo_usuario;
use App\Registros_sistema;
use App\Evento_sistema;

use Carbon\Carbon;

class UsuariosController extends Controller
{
    public function login(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required',
    		'password' => 'required',
    	]);

    	$user_password= Usuario::searchUser(strtolower($request->input('username')));

    	if (!empty($user_password)) {
    		if (password_verify($request->input('password'), $user_password->clave)) {
	    		$user_info= Usuario::selectPass(strtolower($request->input('username')));

	    		if ($user_info->estatus) {
	    			$request->session()->put('id', $user_info->id_usuario);
		    		$request->session()->put('nombre', $user_info->nombres);
		    		$request->session()->put('apellido', $user_info->apellido);
		    		$request->session()->put('tipo_usuario', $user_info->tipo_usuario);
		    		$request->session()->put('acceso_total', $user_info->acceso_total);

		    		//se añade el registro del login del usuario en el sistema
		    		$date= Carbon::now();
            		$fecha_actual= $date->toDateTimeString();

            		$evento= Evento_sistema::consultarEvento(ucfirst(strtolower('Login')));

            		$descripcion= 'El usuario (id) '.$user_info->id_usuario.' se ha iniciado sesion en el sistema';

            		Registros_sistema::crear_registro($user_info->id_usuario, $descripcion, $fecha_actual, $evento->id_evento_sistema);

		    		return redirect('home');
	    		} else
	    			return redirect()->back()->withErrors(['message' => 'El usuario esta inhabilitado por el sistema']); //quiero ver como enviar un alert de mira el usuario esta bloqueado
	    	} else
	    		return redirect()->back()->withErrors(['message' => 'Contraseña Incorrecta']); //quiero ver como enviar un alert de contraseña incorrecta
    	} else
    		return redirect()->back()->withErrors(['message' => 'El usuario no existe']); //quier ver como enviar un alert de que el usuario no existeS
    }

    public function logout(Request $request)
    {
    	//se añade el registro del login del usuario en el sistema
		$date= Carbon::now();
        $fecha_actual= $date->toDateTimeString();

        $evento= Evento_sistema::consultarEvento(ucfirst(strtolower('Logout')));

        $descripcion= 'El usuario (id) '.session('id').' ha cerrado sesion en el sistema';

        Registros_sistema::crear_registro(session('id'), $descripcion, $fecha_actual, $evento->id_evento_sistema);

    	$request->session()->flush();
    	return redirect('login');
    }
}
