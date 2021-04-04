<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAlta;
use App\Http\Requests\StorePermiso;

use App\Ingreso;
use App\Causa_egresoModel;
use App\Motivo_permisoModel;
use App\Cama;
use App\Evento_sistema;
use App\Registros_sistema;
use App\Permiso_pacienteModel;
use App\TrasladoModel;

use Carbon\Carbon;

class AltasController extends Controller
{
    public function index()
    {
    	if (empty(session('id'))) {
            return redirect('login')->withErrors(['message' => 'Debe iniciar sesion']);
        }
    	return view('altas_permisos');
    }

    public function buscarPaciente(Request $request)
    {
    	$cod_cama = strtoupper($request->input('cod_cama'));
    	$num_historia = $request->input('num_historia');
    	$num_ingreso = $request->input('num_ingreso');

    	$resultado = Ingreso::buscarPaciente($cod_cama, $num_historia, $num_ingreso);

    	if ($resultado) {
    		print(json_encode($resultado));
    	} else {
    		http_response_code(422);
    		die(
    			print(json_encode(["errors" => 'No se encontraron resultados']))
    		);
    	}
    }

    public function causasEgreso()
    {
    	$causas_egreso = Causa_egresoModel::consultaCausasEgreso();
    	print(json_encode($causas_egreso));
    }

    public function motivosPermiso()
    {
    	$motivos_permiso= Motivo_permisoModel::consultaMotivosPermiso();
    	print(json_encode($motivos_permiso));
    }

    public function obtenerNumeroPermiso(Request $request)
    {

    	if ($request->input('num_ingreso')) {
    		$numPermiso= Permiso_pacienteModel::numeroPermiso($request->input('num_ingreso'));
	        if (empty($numPermiso)) {
	            print(json_encode(1));    
	        } else {
	            if (is_numeric($numPermiso->nro_permiso)) {
	                print(json_encode($numPermiso->nro_permiso + 1));
	            } else {
	                print(json_encode());
	            }
	        }
    	} else {
    		http_response_code(422);
	    	die(
	    		print(json_encode(["errors" => 'Alerta: Debe obtener los datos del paciente primero']))
	    	);
    	}
    }

    public function registrarAlta(StoreAlta $request)
    {
        $params= $request->input();

        $traslados= TrasladoModel::consultarCantidadTraslados($params['num_ingreso']);

        if (!count($traslados)) {
            $resultado = Ingreso::validarAlta($params['num_ingreso']);

            if (!$resultado) {
                Ingreso::altaPaciente($params['num_ingreso'], $params['fecha_alta'], $params['motivo_alta']);

                Cama::actualizarEstatusCama($params['id_cama'], 'DISPONIBLE');

                $date= Carbon::now();
                $fecha_actual= $date->toDateTimeString();

                //se añade el registro del registro de un paciente sistema
                $evento= Evento_sistema::consultarEvento(ucfirst(strtolower('Registro alta')));

                $descripcion= 'El usuario (id) '.session('id').' ha registrado una alta para el ingreso (id) '.$params['num_ingreso'].' en el sistema';

                Registros_sistema::crear_registro(session('id'), $descripcion, $fecha_actual, $evento->id_evento_sistema);

                print(json_encode('exito'));
            } else {
                http_response_code(422);
                die(
                    print(json_encode(["errors" => 'El paciente ya fue dado de alta']))
                );
            }
        } else {
            return response()->json(['errors' => 'Hay solicitudes de traslado pendientes, no se puede procesar'], 422);
        }
    }

    public function registrarPermiso(StorePermiso $request)
    {
        $params= $request->input();

        $resultado = Ingreso::validarPermiso($params['num_ingreso']);

        if (!$resultado) {
            $fecha_reintegro = Carbon::create($params['fecha_permiso']);

            if ($params['motivo_permiso'] == 1) {
                $fecha_reintegro->addHours(12);
            } else if ($params['motivo_permiso'] == 2) {
                $fecha_reintegro->addDay();
            } else if ($params['motivo_permiso'] == 3) {
                $fecha_reintegro->addDays(2);
            } else if ($params['motivo_permiso'] == 4) {
                $fecha_reintegro->addDays(3);
            } else if ($params['motivo_permiso'] == 5) {
                $fecha_reintegro->addDays(2);
            }

            $id_permiso = Permiso_pacienteModel::registrarPermiso($params['num_ingreso'], $fecha_reintegro, $params['motivo_permiso'], $params['num_permiso']);

            Cama::actualizarEstatusCama($params['id_cama'], 'DISPONIBLE');

            $date= Carbon::now();
            $fecha_actual= $date->toDateTimeString();

            //se añade el registro del registro de un paciente sistema
            $evento= Evento_sistema::consultarEvento(ucfirst(strtolower('Registro permiso')));

            $descripcion= 'El usuario (id) '.session('id').' ha registro un permiso (id) '.$id_permiso.' para el ingreso (id) '.$params['num_ingreso'].' en el sistema';

            Registros_sistema::crear_registro(session('id'), $descripcion, $fecha_actual, $evento->id_evento_sistema);

            print(json_encode('exito'));

        } else {
            http_response_code(422);
            die(
                 print(json_encode(["errors" => 'El paciente ya fue dado de alta o esta de permiso']))
            );
        }
    }
}
