<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSolicitudTraslado;
use App\Http\Requests\StoreProcesarTraslado;
use App\Cama;
use App\Ingreso;
use App\Diagnostico_paciente;
use App\Tipo_trasladoModel;
use App\Tipo_habitacion;
use App\TrasladoModel;
use App\Evento_sistema;
use App\Registros_sistema;

use Carbon\Carbon;

class TrasladoController extends Controller
{
    public function index()
    {
    	if (empty(session('id'))) {
            return redirect('login')->withErrors(['message' => 'Debe iniciar sesion']);
        }
    	return view('solicitud_traslado');
    }

    public function getCurrentDate()
    {
    	$date= Carbon::now();
        print(json_encode($date->toDateTimeString()));
    }

    public function camas(Request $request)
    {
    	$tipo_habitacion = strtoupper($request->input('tipo_habitacion'));
    	$nro_habitacion= strtoupper($request->input('nro_habitacion'));
    	$codigo_cama= strtoupper($request->input('codigo_cama'));
    	$tipo_cama= strtoupper($request->input('tipo_cama'));
    	
    	$camas= Cama::consultarCamasOcupadas($tipo_habitacion, $nro_habitacion, $codigo_cama, $tipo_cama);
    	print(json_encode($camas));
    }

    public function buscarIngresoCama(Request $request)
    {
    	$id_cama= $request->input('cama_id');
    	$resultado= Ingreso::buscarIngresoCama($id_cama);
    	
    	if ($resultado) {
    		print(json_encode($resultado));
    	} else {
    		http_response_code(422);
    		die(
    			print(json_encode(["errors" => 'No se encontraron resultados']))
    		);
    	}
    }

    public function buscarIngreso(Request $request)
    {
    	$id_ingreso = $request->input('ingreso_id');
    	$resultado= Ingreso::buscarIngreso($id_ingreso);

    	if ($resultado) {
    		print(json_encode($resultado));
    	} else {
    		http_response_code(422);
    		die(
    			print(json_encode(["errors" => 'No se encontraron resultados']))
    		);
    	}
    }

    public function buscarDiagnosticosPaciente(Request $request)
    {
    	$id_ingreso= $request->input('id_ingreso');
    	$resultado= Diagnostico_paciente::buscarDiagnosticosPaciente($id_ingreso);
    	print(json_encode($resultado));
    }

    public function tiposTraslados()
    {
    	$resultado= Tipo_trasladoModel::consultaTiposTraslado();
    	print(json_encode($resultado));
    }

    public function tiposHabitaciones()
    {
    	$resultado= Tipo_habitacion::consulta_tipo_habitaciones();
    	print(json_encode($resultado));
    }

    public function registrarSolicitudTraslado(StoreSolicitudTraslado $request)
    {
    	$params= $request->input();

    	$traslados= TrasladoModel::consultarCantidadTraslados($params['numero_ingreso']);

    	if (!count($traslados)) {
    		$date= Carbon::now();
    		$fecha_actual= $date->toDateTimeString();

    		$datos_paciente = Ingreso::datosIngreso($params['numero_ingreso']);

    		$nro_renglon= 1;
    		$resultado = TrasladoModel::consultarTrasladoActivo($params['numero_ingreso']);

    		if (!empty($resultado))
   				$nro_renglon= count($resultado) + 1;

    		$id_traslado = TrasladoModel::crearSolicitud($fecha_actual, $nro_renglon, $datos_paciente->id_cama, $params['numero_ingreso'], $params['tipo_habitacion_solicitado'], $datos_paciente->id_servicio, $params['servicio_solicitado'], $params['tipo_traslado']);

    		//se añade el registro del registro de un paciente sistema
    		$evento= Evento_sistema::consultarEvento(ucfirst(strtolower('Solicitud traslado')));

    		$descripcion= 'El usuario (id) '.session('id').' ha registro una solicitud de traslado (id) '.$id_traslado.' para el paciente (id) '.$datos_paciente->id_paciente.' en el sistema';

    		Registros_sistema::crear_registro(session('id'), $descripcion, $fecha_actual, $evento->id_evento_sistema);

    		print(json_encode('exito'));
    	} else {
    		http_response_code(422);
    		die(
    			print(json_encode(["errors" => 'Ya se encuentra una solicitud activa para este paciente']))
    		);
    	}
    }

    public function controlTraslado()
    {
        if (empty(session('id'))) {
            return redirect('login')->withErrors(['message' => 'Debe iniciar sesion']);
        }
        return view('control_traslado');
    }

    public function buscarIngresoControl(Request $request)
    {
        $id_ingreso = $request->input('ingreso_id');
        $resultado= Ingreso::buscarIngresoControl($id_ingreso);

        if ($resultado) {
            print(json_encode($resultado));
        } else {
            http_response_code(422);
            die(
                print(json_encode(["errors" => 'No se encontraron resultados']))
            );
        }
    }

    public function camasControl(Request $request)
    {
        $id_servicio = $request->input('id_servicio');
        $tipo_habitacion = strtoupper($request->input('tipo_habitacion'));
        $nro_habitacion= strtoupper($request->input('nro_habitacion'));
        $codigo_cama= strtoupper($request->input('codigo_cama'));
        $tipo_cama= strtoupper($request->input('tipo_cama'));
        
        $camas= Cama::consultarCamasServicio($id_servicio, $tipo_habitacion, $nro_habitacion, $codigo_cama, $tipo_cama);
        print(json_encode($camas));
    }

    public function buscarTraslado(Request $request)
    {
        $id_traslado= $request->input('id_traslado');

        $traslado= TrasladoModel::buscarTraslado($id_traslado);
        print(json_encode($traslado));
    }

    public function consultarTraslados()
    {
        $traslados= TrasladoModel::consultarTraslados();
        print(json_encode($traslados));
    }

    public function procesarTraslado(StoreProcesarTraslado $request)
    {

        $params= $request->input();

        $traslado= TrasladoModel::consultarEstatusTraslado($params['id_traslado']);

        if ($traslado) {
            $date= Carbon::now();
            $fecha_actual= $date->toDateTimeString();

            Cama::actualizarEstatusCama($params['cama_solic'], 'OCUPADO');
            Cama::actualizarEstatusCama($traslado->id_cama_act, 'DISPONIBLE');

            Ingreso::actualizarCamaActual($traslado->id_ingreso, $params['cama_solic']);

            $id_traslado = TrasladoModel::aprobarTraslado($params['id_traslado'], $fecha_actual, $params['cama_solic'], $params['servicio_solic'], $traslado->id_ingreso);

            //se añade el registro del registro de un paciente sistema
            $evento= Evento_sistema::consultarEvento(ucfirst(strtolower('Asignacion cama traslado')));

            $descripcion= 'El usuario (id) '.session('id').' ha asignado una cama (id) '.$params['cama_solic'].' para la solicitud de traslado (id) '.$id_traslado.' del paciente (id) '.$traslado->id_paciente.' en el sistema';

            Registros_sistema::crear_registro(session('id'), $descripcion, $fecha_actual, $evento->id_evento_sistema);

            print(json_encode('exito'));
        } else {
            http_response_code(422);
            die(
                print(json_encode(["errors" => 'La solicitud no tiene estado "Solicitado"']))
            );
        }
    }
}
