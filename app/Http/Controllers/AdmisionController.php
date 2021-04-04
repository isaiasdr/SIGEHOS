<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAdmision;
use App\Ingreso;
use App\PacienteModel;
use App\Cama;
use App\Causa_atencion;
use App\Clasif_causa_atencion;
use App\Medico;
use App\Diagnostico;
use App\Referencia;
use App\Diagnostico_paciente;
use App\Evento_sistema;
use App\Registros_sistema;

use Carbon\Carbon;

class AdmisionController extends Controller
{
    public function index()
    {
    	if (empty(session('id'))) {
            return redirect('login')->withErrors(['message' => 'Debe iniciar sesion']);
        }
    	return view('admision');
    }

    public function getCurrentDate()
    {
        $date= Carbon::now();
        print(json_encode($date->toDateTimeString()));
    }

    public function getNumIngreso()
    {
        $numIngreso= Ingreso::consultarNumeroIngreso();
        if (empty($numIngreso)) {
            print(json_encode(1));    
        } else {
            print(json_encode($numIngreso->ingreso + 1));
        }
    }

    public function busquedaPaciente(Request $request)
    {
    	$this->validate($request, [
    		'tipo_cedula' => 'required',
    		'cedula' => 'required',
    	]);

    	$paciente = PacienteModel::buscarPaciente($request->input('tipo_cedula'), $request->input('cedula'));
    	if ($paciente) {
    		print(json_encode($paciente));
    	} else {
    		http_response_code(422);
    		die(
    			print(json_encode(["errors" => 'No se encontraron resultados']))
    		);
    	}
    }

    public function busquedaPacienteHistoria(Request $request)
    {
        $this->validate($request, [
            'num_historia' => 'required'
        ]);

        $paciente = PacienteModel::buscarPacienteHistoria($request->input('num_historia'));
        if ($paciente) {
            print(json_encode($paciente));
        } else {
            http_response_code(422);
            die(
                print(json_encode(["errors" => 'No se encontraron resultados']))
            );
        }
    }

    public function busquedaIngresoHistoria(Request $request)
    {
        $this->validate($request, [
            'num_historia' => 'required'
        ]);

        $paciente = PacienteModel::busquedaIngresoHistoria($request->input('num_historia'));
        if ($paciente) {
            print(json_encode($paciente));
        } else {
            http_response_code(422);
            die(
                print(json_encode(["errors" => 'No se encontraron resultados']))
            );
        }
    }

    public function busquedaIngreso(Request $request)
    {
        $this->validate($request, [
            'num_ingreso' => 'required'
        ]);

        $paciente = PacienteModel::busquedaIngreso($request->input('num_ingreso'));
        if ($paciente) {
            print(json_encode($paciente));
        } else {
            http_response_code(422);
            die(
                print(json_encode(["errors" => 'No se encontraron resultados']))
            );
        }
    }

    public function busquedaIngresoCedula(Request $request)
    {
        $this->validate($request, [
            'tipo_cedula' => 'required',
            'cedula' => 'required'
        ]);

        $paciente = PacienteModel::busquedaIngresoCedula($request->input('tipo_cedula'), $request->input('cedula'));
        if ($paciente) {
            print(json_encode($paciente));
        } else {
            http_response_code(422);
            die(
                print(json_encode(["errors" => 'No se encontraron resultados']))
            );
        }
    }

    public function camas(Request $request)
    {
    	$id_servicio= $request->input('servicio_id');
        $tipo_habitacion = strtoupper($request->input('tipo_habitacion'));
        $nro_habitacion= strtoupper($request->input('nro_habitacion'));
        $codigo_cama= strtoupper($request->input('codigo_cama'));
        $tipo_cama= strtoupper($request->input('tipo_cama'));

    	$camas= Cama::consultarCamasServicio($id_servicio, $tipo_habitacion, $nro_habitacion, $codigo_cama, $tipo_cama);
    	print(json_encode($camas));
    }

    public function medicos(Request $request)
    {
    	$id_servicio= $request->input('servicio_id');
    	$medicos= Medico::consultar_medicos_servicio($id_servicio);
    	print(json_encode($medicos));
    }

    public function diagnosticos(Request $request)
    {
        $diagnostico= strtoupper($request->input('diagnostico'));
        $codigo= strtoupper($request->input('codigo'));
    	$diagnosticos= Diagnostico::consultar_diagnosticos($diagnostico, $codigo);
    	print(json_encode($diagnosticos));
    }

    public function causas_atencion()
    {
    	$causas= Causa_atencion::consulta_causas_atencion();
    	print(json_encode($causas));
    }

    public function clasificaciones_causas(Request $request)
    {
    	$id_causa_atencion= $request->input('causa_atencion_id');
    	$clasificaciones= Clasif_causa_atencion::consulta_clasif_atencion($id_causa_atencion);
    	print(json_encode($clasificaciones));
    }

    public function referencias()
    {
        $referencias= Referencia::consultarReferencias();
        print(json_encode($referencias));
    }

    public function registrarAdmision(StoreAdmision $request)
    {
        $params= $request->input();

        $resultado = Ingreso::buscarPacienteAdmitido($params['id_paciente']);

        if (!count($resultado)) {
            $date= Carbon::now();
            $fecha_actual= $date->toDateTimeString();

            //se registra al paciente
            $id_ingreso= Ingreso::registrarIngreso($params['numero_ingreso'], $fecha_actual, $params['codigo_clasificacion_causa'], $params['id_cama'], $params['causa_atencion'], $params['referido'], $params['id_paciente'], $params['servicio_tratante'], $params['medico_cedula']);

            Cama::actualizarEstatusCama($params['id_cama'], 'OCUPADO');

            //se registran los diagnosticos
            foreach ($params['id_diagnosticos_paciente'] as $key => $id_diagnostico) {
                Diagnostico_paciente::registrarDiagnostico($params['diagnostico_paciente'][$key], ($key+1), $id_ingreso, $id_diagnostico);
            }

            //se añade el registro del registro de un paciente sistema
            $evento= Evento_sistema::consultarEvento(ucfirst(strtolower('Registro admision')));

            $descripcion= 'El usuario (id) '.session('id').' ha registro una admision (id) '.$id_ingreso.' paciente (id) '.$params['id_paciente'].' en el sistema';

            Registros_sistema::crear_registro(session('id'), $descripcion, $fecha_actual, $evento->id_evento_sistema);

            print(json_encode('exito'));
        } else {
            http_response_code(422);
            die(
                print(json_encode(["errors" => 'El paciente ya se encuentra admitido']))
            );
        }
    }

    public function modificarAdmision(Request $request)
    {
        
    }
}
