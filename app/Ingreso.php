<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingreso';
    protected $primaryKey = 'id_ingreso';
    public $timestamps = false;

    static public function consultarNumeroIngreso()
    {
    	return Ingreso::all()->last();
    }

    static public function registrarIngreso($num_ingreso, $fecha, $cod_clasificacion_causa, $id_cama, $id_causa_atencion, $id_referencia, $id_paciente, $id_servicio, $cedula_medico= null)
    {
    	return Ingreso::insertGetId([
    		'ingreso' => $num_ingreso,
    		'cod_clasf_causa' => $cod_clasificacion_causa, 
    		'fecha_ingreso' => $fecha, 
    		'id_cama_inicial' => $id_cama,
            'id_cama' => $id_cama, 
   			'id_causa_atencion' => $id_causa_atencion, 
   			'id_causa_egreso' => 1, 
   			'id_estatus_paciente' => 1, 
   			'id_referencia' => $id_referencia, 
    		'id_paciente' => $id_paciente, 
    		'id_servicio' => $id_servicio, 
    		'id_servicio_inicial' => $id_servicio, 
    		'cedula_medico' => $cedula_medico
    	], 'id_ingreso');
    }
    
    static public function modifcarIngreso()
    {
    	# code...
    }

    static public function buscarIngresoCama($id_cama)
    {
        return Ingreso::select('cama.codigo_cama', 'ingreso.id_ingreso', 'paciente.tipo_cedula', 'paciente.cedula', 'paciente.historia', 'paciente.fecha_nacimiento', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), 'paciente.sexo', 'servicio.id_servicio', 'servicio.descripcion as servicio', 'tipo_servicio.descripcion as tipo_servicio', 'tipo_habitacion.codigo', 'tipo_habitacion.descripcion as tipo_habitacion', 'medico.cedula as cedula_medico', DB::raw("CONCAT(medico.nombres, ' ', medico.apellidos) as nombre_medico"))
                        ->join('cama', 'cama.id_cama', '=', 'ingreso.id_cama')
                        ->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
                        ->join('servicio', 'servicio.id_servicio', '=', 'ingreso.id_servicio')
                        ->join('tipo_servicio', 'tipo_servicio.id_tipo_servicio', '=', 'servicio.id_tipo_servicio')
                        ->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
                        ->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
                        ->leftJoin('medico', 'medico.cedula', '=', 'ingreso.cedula_medico')
                        ->where('ingreso.id_cama', $id_cama)
                        ->orderBy('ingreso.id_ingreso', 'desc')->first();
    }

    static public function buscarIngreso($id_ingreso)
    {
        return Ingreso::select('cama.codigo_cama', 'ingreso.id_ingreso', 'paciente.tipo_cedula', 'paciente.cedula', 'paciente.historia', 'paciente.fecha_nacimiento', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), 'paciente.sexo', 'servicio.id_servicio', 'servicio.descripcion as servicio', 'tipo_servicio.descripcion as tipo_servicio', 'tipo_habitacion.codigo', 'tipo_habitacion.descripcion as tipo_habitacion', 'medico.cedula as cedula_medico', DB::raw("CONCAT(medico.nombres, ' ', medico.apellidos) as nombre_medico"))
                        ->join('cama', 'cama.id_cama', '=', 'ingreso.id_cama')
                        ->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
                        ->join('servicio', 'servicio.id_servicio', '=', 'ingreso.id_servicio')
                        ->join('tipo_servicio', 'tipo_servicio.id_tipo_servicio', '=', 'servicio.id_tipo_servicio')
                        ->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
                        ->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
                        ->leftJoin('medico', 'medico.cedula', '=', 'ingreso.cedula_medico')
                        ->where('ingreso.id_ingreso', $id_ingreso)->first();
    }

    static public function datosIngreso($id_ingreso)
    {
        return Ingreso::select('*')->where('id_ingreso', $id_ingreso)->first();
    }

    static public function buscarPacienteAdmitido($id_paciente)
    {
        return Ingreso::where('id_paciente', $id_paciente)->where('id_estatus_paciente', 1)->get();
    }

    static public function buscarIngresoControl($id_ingreso)
    {
        return Ingreso::select('cama.codigo_cama', 'ingreso.id_ingreso', 'paciente.tipo_cedula', 'paciente.cedula', 'paciente.historia', 'paciente.fecha_nacimiento', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), 'paciente.sexo', 'servicio.id_servicio', 'servicio.descripcion as servicio', 'tipo_servicio.descripcion as tipo_servicio', 'tipo_habitacion.codigo', 'tipo_habitacion.descripcion as tipo_habitacion', 'medico.cedula as cedula_medico', DB::raw("CONCAT(medico.nombres, ' ', medico.apellidos) as nombre_medico"), 'traslado.id_traslado')
                        ->join('cama', 'cama.id_cama', '=', 'ingreso.id_cama')
                        ->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
                        ->join('servicio', 'servicio.id_servicio', '=', 'ingreso.id_servicio')
                        ->join('tipo_servicio', 'tipo_servicio.id_tipo_servicio', '=', 'servicio.id_tipo_servicio')
                        ->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
                        ->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
                        ->join('traslado', 'traslado.id_ingreso', '=', 'ingreso.id_ingreso')
                        ->leftJoin('medico', 'medico.cedula', '=', 'ingreso.cedula_medico')
                        ->where('traslado.id_ingreso', $id_ingreso)
                        ->orderBy('traslado.id_traslado', 'desc')->first();
    }

    static public function actualizarCamaActual($id_ingreso, $id_cama)
    {
        Ingreso::where('id_ingreso', $id_ingreso)->update(['id_cama' => $id_cama]);
    }

    static public function buscarPaciente($codigo_cama= null, $numero_historia= null, $numero_ingreso= null)
    {
        $query = Ingreso::select('cama.codigo_cama', 'cama.id_cama', 'paciente.historia as numero_historia', 'ingreso.id_ingreso as numero_ingreso', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), DB::raw("CONCAT(paciente.tipo_cedula, '-', paciente.cedula) as cedula"), 'paciente.sexo', 'ingreso.fecha_ingreso', DB::raw("CONCAT(medico.nombres, ' ', medico.apellidos) as nombre_medico"), 'estatus_paciente.descripcion as estatus', 'servicio.descripcion as servicio')
                ->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
                ->join('cama', 'cama.id_cama', '=', 'ingreso.id_cama')
                ->join('servicio', 'servicio.id_servicio', '=', 'ingreso.id_servicio')
                ->join('estatus_paciente', 'estatus_paciente.id_estatus_paciente', '=', 'ingreso.id_estatus_paciente')
                ->leftJoin('medico', 'medico.cedula', '=', 'ingreso.cedula_medico');

        if ($codigo_cama) {
            $query->where('cama.codigo_cama', $codigo_cama);
        } elseif ($numero_historia) {
            $query->where('paciente.historia', $numero_historia);
        } elseif ($numero_ingreso) {
            $query->where('ingreso.id_ingreso', $numero_ingreso);
        }

        return $query->orderBy('ingreso.id_ingreso', 'desc')->first();
    }

    static public function altaPaciente($id_ingreso, $fecha_alta, $motivo_alta)
    {
        Ingreso::where('id_ingreso', $id_ingreso)->update(['fecha_alta_medica' => $fecha_alta, 'id_causa_egreso' => $motivo_alta, 'id_estatus_paciente' => 2]);
    }

    static public function validarAlta($id_ingreso)
    {
        return Ingreso::where('id_ingreso', $id_ingreso)->where('id_causa_egreso', '!=', 1)->first();
    }

    static public function validarPermiso($id_ingreso)
    {
        return Ingreso::where('id_ingreso', $id_ingreso)->where('id_estatus_paciente', '!=', 1)->first();
    }
}
