<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePacienteRegular;
use App\Http\Requests\StorePacienteEmergencia;
use DB;
use App\Ocupacion;
use App\Nacionalidad;
use App\Ciudad;
use App\Estatus;
use App\Profesion;
use App\Religion;
use App\Zona;
use App\Parentesco;
use App\Edo_civil;
use App\PacienteModel;
use App\Dias;
use App\Meses;
use App\Años;
use App\Evento_sistema;
use App\Registros_sistema;

use Carbon\Carbon;


class PacienteController extends Controller
{
    public function index()
    {
        if (empty(session('id'))) {
            return redirect('login')->withErrors(['message' => 'Debe iniciar sesion']);
        }
    	return view('registro_paciente');
    }

    public function consultaProfesiones()
    {
    	$profesiones= Profesion::consultaProfesiones();
    	print(json_encode($profesiones));
    }

    public function consultaReligiones()
    {
    	$religiones= Religion::consultaReligiones();
    	print(json_encode($religiones));
    }

    public function consultaOcupaciones()
    {
    	$ocupaciones = Ocupacion::consultaOcupaciones();
    	print(json_encode($ocupaciones));
    }

    public function consultaZonas()
    {
    	$zonas = Zona::consultaZonas();
    	print(json_encode($zonas));
    }

    public function consultaNacionalidades()
    {
    	$nacionalidades = Nacionalidad::consultaNacionalidades();
    	print(json_encode($nacionalidades));
    }

    public function consultaParentescos()
    {
    	$parentescos= Parentesco::consultaParentescos();
    	print(json_encode($parentescos));
    }

    public function consultaEstadosCiviles()
    {
    	$edo_civiles= Edo_civil::consultaEstadosCiviles();
    	print(json_encode($edo_civiles));
    }

    public function getCurrentDate()
    {
        $date= Carbon::now();
        print(json_encode($date->toDateString()));
    }

    public function getNumHistoria()
    {
        $numHistoria= PacienteModel::consultarNumeroHistoria();
        if (empty($numHistoria)) {
            print(json_encode(1));    
        } else {
            if (is_numeric($numHistoria->historia)) {
                print(json_encode($numHistoria->historia + 1));
            } else {
                print(json_encode());
            }
        }
    }

    public function consultarPaciente(Request $request)
    {
        $tipo_cedula = $request->input('tipo_cedula');
        $cedula = $request->input('cedula');

        $datos= PacienteModel::consultarPaciente($tipo_cedula, $cedula);
        if ($datos) {
            return response()->json($datos);
        } else {
            return response()->json(['errors' => 'No hay registro de un paciente con esa identificacion'], 422);
        }
    }

    public function consultarAcompañantes(Request $request)
    {
        $id_paciente = $request->input('id_paciente');

        $acompañantes = DB::table('acompanantes')->select('acompanantes.nombres', 'acompanantes.apellidos', 'acompanantes.cedula', 'acompanantes.telefono', 'parentesco.descripcion as parentesco_nombre')->join('parentesco', 'acompanantes.id_parentesco', '=', 'parentesco.id_parentesco')->where('id_paciente', $id_paciente)->get();

        return response()->json($acompañantes);
    }

    public function generar_identificacion()
    {
        $identificacion= PacienteModel::consultarIdentificacion_noIdentificados();
        if (empty($identificacion)) {
            print(json_encode(1));    
        } else {
            print(json_encode($identificacion->cedula + 1));
        }
    }

    public function registrar_paciente(StorePacienteRegular $request)
    {
        $params= $request->input();

        $paciente= PacienteModel::buscarPaciente($params['Tipo_cedula_paciente'], $params['cedula_paciente']);

        if (!$paciente) {

            $date= Carbon::now();
            $fecha_actual= $date->toDateTimeString();

            $nombre1= null;
            $nombre2= null;
            $pos= strpos($params['Nombres_paciente'], ' ');
            if ($pos === false) {
                $nombre1= $params['Nombres_paciente'];
            } else {
                $nombre1= substr($params['Nombres_paciente'], 0, $pos);
                $nombre2= substr($params['Nombres_paciente'], $pos+1);
            }
                 
            $apellido1= null;
            $apellido2= null;
            $pos= strpos($params['Apellidos_paciente'], ' ');
            if ($pos === false) {
                $apellido1= $params['Apellidos_paciente'];
            } else {
                $apellido1= substr($params['Apellidos_paciente'], 0, $pos);
                $apellido2= substr($params['Apellidos_paciente'], $pos+1);
            }

            $fecha_nacimiento = Carbon::create($params['fecha_nacimiento']);

            //por ahora quedara asi, luego ver si lo puedo pasar al modelo
            $id_paciente= DB::table('paciente')->insertGetId([
                'cedula' => $params['cedula_paciente'],
                'tipo_cedula' => $params['Tipo_cedula_paciente'],
                'direccion' => $params['domicilio_paciente'],
                'fecha_historia' => $fecha_actual,
                'modificacion_historia' => $fecha_actual,
                'fecha_nacimiento' => $fecha_nacimiento->toDateString(),
                'historia' => $params['numero_historia'],
                'telefono' => $params['telefono_paciente'],
                'primer_nombre' => $nombre1,
                'segundo_nombre' => $nombre2,
                'primer_apellido' => $apellido1,
                'segundo_apellido' => $apellido2,
                'edo_civil' => $params['edo_civil_paciente'],
                'sexo' => $params['sexo_paciente'],
                'id_ocupacion' => $params['ocupacion_paciente'],
                'id_nacionalidad' => $params['nacionalidad_paciente'],
                'id_religion' => $params['religion_paciente'],
                'id_profesion' => $params['profesion_paciente'],
                'lugar_nacimiento' => $params['lugar_nacimiento_paciente'],
                'id_zona' => $params['zona_paciente'],
                'id_estatus' => 1,
                'correlativo_ci' => !empty($params['numero_hijo']) ? $params['numero_hijo'] : 0
            ], 'id_paciente');

            if (isset($params['acompañante_nombres'])) {
                //se registran los acompañantes en caso de haberlos
                foreach ($params['acompañante_nombres'] as $key => $nombre) {
                    DB::table('acompanantes')->insert([
                        'nombres' => $nombre,
                        'apellidos' => $params['acompañante_apellidos'][$key],
                        'cedula' => $params['acompañante_cedula'][$key],
                        'telefono' => $params['acompañante_telefono'][$key],
                        'id_parentesco' => $params['acompañante_parentesco_id'][$key],
                        'id_paciente' => $id_paciente
                    ]);
                }
            }

            //se añade el registro del registro de un paciente sistema
            $evento= Evento_sistema::consultarEvento(ucfirst(strtolower('Registro paciente')));

            $descripcion= 'El usuario (id) '.session('id').' ha registro un paciente (id) '.$id_paciente.' en el sistema';

            Registros_sistema::crear_registro(session('id'), $descripcion, $fecha_actual, $evento->id_evento_sistema);

            print(json_encode('exito'));

        } else {
            return response()->json(['error' => 'El usuario ya se encuentra registrado'], 422);
        }
    }

    public function registrarPacienteEmergencia(StorePacienteEmergencia $request)
    {
        $params= $request->input();

        $date= Carbon::now();
        $fecha_actual= $date->toDateTimeString();

        $nombre1= null;
        $nombre2= null;
        if (!empty($params['Nombres_paciente'])) {
            $pos= strpos($params['Nombres_paciente'], ' ');
            if ($pos === false) {
                $nombre1= $params['Nombres_paciente'];
            } else {
                $nombre1= substr($params['Nombres_paciente'], 0, $pos);
                $nombre2= substr($params['Nombres_paciente'], $pos+1);
            }
        }
                 
        $apellido1= null;
        $apellido2= null;
        if (!empty($params['Apellidos_paciente'])) {
            $pos= strpos($params['Apellidos_paciente'], ' ');
            if ($pos === false) {
                $apellido1= $params['Apellidos_paciente'];
            } else {
                $apellido1= substr($params['Apellidos_paciente'], 0, $pos);
                $apellido2= substr($params['Apellidos_paciente'], $pos+1);
            }
        }   

        $fecha_nacimiento= null;
        if (!empty($params['año_nacimiento']) && !empty($params['mes_nacimiento']) && !empty($params['dia_nacimiento'])) {
            $fecha_nacimiento= Carbon::create($params['año_nacimiento'], $params['mes_nacimiento'], $params['dia_nacimiento'], 0);
        }

        //por ahora quedara asi, luego ver si lo puedo pasar al modelo
        $id_paciente= DB::table('paciente')->insertGetId([
            'cedula' => $params['cedula_paciente'],
            'tipo_cedula' => $params['Tipo_cedula_paciente'],
            'direccion' => !empty($params['domicilio_paciente']) ? $params['domicilio_paciente'] : null,
            'fecha_historia' => $fecha_actual,
            'modificacion_historia' => $fecha_actual,
            'fecha_nacimiento' => !empty($fecha_nacimiento) ? $fecha_nacimiento->toDateString() : null,
            'historia' => $params['numero_historia'],
            'telefono' => !empty($params['telefono_paciente']) ? $params['telefono_paciente'] : null,
            'primer_nombre' => $nombre1,
            'segundo_nombre' => $nombre2,
            'primer_apellido' => $apellido1,
            'segundo_apellido' => $apellido2,
            'edo_civil' => !empty($params['edo_civil_paciente']) ? $params['edo_civil_paciente'] : null,
            'sexo' => $params['sexo_paciente'],
            'id_ocupacion' => !empty($params['ocupacion_paciente']) ? $params['ocupacion_paciente'] : null,
            'id_nacionalidad' => !empty($params['nacionalidad_paciente']) ? $params['nacionalidad_paciente'] : null,
            'id_religion' => !empty($params['religion_paciente']) ? $params['religion_paciente'] : null,
            'id_profesion' => !empty($params['profesion_paciente']) ? $params['profesion_paciente'] : null,
            'lugar_nacimiento' => !empty($params['lugar_nacimiento_paciente']) ? $params['lugar_nacimiento_paciente'] : null,
            'id_zona' => !empty($params['zona_paciente']) ? $params['zona_paciente'] : null,
            'id_estatus' => 1,
            'correlativo_ci' => !empty($params['numero_hijo']) ? $params['numero_hijo'] : 0
        ], 'id_paciente');

        if (isset($params['acompañante_nombres'])) {
            //se registran los acompañantes en caso de haberlos
            foreach ($params['acompañante_nombres'] as $key => $nombre) {
                DB::table('acompanantes')->insert([
                    'nombres' => $nombre,
                    'apellidos' => $params['acompañante_apellidos'][$key],
                    'cedula' => $params['acompañante_cedula'][$key],
                    'telefono' => $params['acompañante_telefono'][$key],
                    'id_parentesco' => $params['acompañante_parentesco_id'][$key],
                    'id_paciente' => $id_paciente
                ]);
            }
        }

        //se añade el registro del registro de un paciente sistema
        $evento= Evento_sistema::consultarEvento(ucfirst(strtolower('Registro paciente')));

        $descripcion= 'El usuario (id) '.session('id').' ha registro un paciente (id) '.$id_paciente.' en el sistema';

        Registros_sistema::crear_registro(session('id'), $descripcion, $fecha_actual, $evento->id_evento_sistema);

        print(json_encode('exito'));
    }
}
