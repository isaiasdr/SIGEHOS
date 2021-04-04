<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tipo_cama;
use App\Tipo_habitacion;
use App\Cama;
use App\Servicio;

class Consultas_admisionController extends Controller
{
    public function tipo_hab_camas()
    {
        if (empty(session('id'))) {
            return redirect('login')->withErrors(['message' => 'Debe iniciar sesion']);
        }
    	return view('consulta_tipo_hab_camas');
    }

    public function consulta_tipo_camas(Request $request)
    {
    	$codigo= strtoupper($request->input('codigo'));
    	$descripcion= strtoupper($request->input('descripcion'));
    	$tipos_camas= Tipo_cama::consulta_tipo_camas($codigo, $descripcion);
    	print(json_encode($tipos_camas));
    }

    public function consulta_tipo_hab(Request $request)
    {
        $codigo= strtoupper($request->input('codigo'));
        $descripcion= strtoupper($request->input('descripcion'));
        $tipos_habitaciones= Tipo_habitacion::consulta_tipo_habitaciones($codigo, $descripcion);
        print(json_encode($tipos_habitaciones));
    }

    public function servicios(Request $request)
    {
        if ($request->input('tipo')) {
            $servicios = Servicio::consultaServicios($request->input('tipo'));
            print(json_encode($servicios));
        } else {
            $servicios = Servicio::consultaServicios();
            print(json_encode($servicios));
        }
    }

    public function estatus()
    {
        $estatus = Cama::consultaEstatus();
        print(json_encode($estatus));
    }

    public function consulta_camas(Request $request)
    {
        $ingreso_hospitalizacion = strtoupper($request->input('check_h'));
        $ingreso_emergencia = strtoupper($request->input('check_e'));
        $servicio_id= $request->input('servicio_id');
        $tipo_habitacion= strtoupper($request->input('tipo_habitacion'));
        $num_habitacion= strtoupper($request->input('num_habitacion'));
        $cod_cama= strtoupper($request->input('cod_cama'));
        $tipo_cama= strtoupper($request->input('tipo_cama'));
        $estatus= $request->input('estatus');
        $num_ingreso= $request->input('num_ingreso');

        $camas= Cama::consultar_camas($ingreso_hospitalizacion, $ingreso_emergencia, $servicio_id, $tipo_habitacion, $num_habitacion, $cod_cama, $tipo_cama, $estatus);
        print(json_encode($camas));
    }

}
