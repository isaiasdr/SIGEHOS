<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class PacienteModel extends Model
{
    protected $table = 'paciente';
    protected $primaryKey = 'id_paciente';
    public $timestamps = false;

    /*protected $fillable = [
    	'cedula',
        'direccion',
        'fecha_historia',
        'modificacion_historia',
        'historia',
        'telefono',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'sexo',
        'id_ocupacion',
        'id_nacionalidad',
        'id_religion',
        'id_profesion',
        'id_ciudad',
        'id_zona',
        'id_estatus' 
    ];*/

    static public function consultarNumeroHistoria()
    {
    	return PacienteModel::all()->last();
    }

    static public function buscarPaciente($tipo_cedula, $cedula)
    {
        return $query = DB::table('paciente')
                    ->join('nacionalidad', 'paciente.id_nacionalidad', '=', 'nacionalidad.id_nacionalidad')
                    ->join('zona', 'paciente.id_zona', '=', 'zona.id_zona')
                    ->select('paciente.id_paciente', 'paciente.primer_nombre', 'paciente.segundo_nombre', 'paciente.primer_apellido', 'paciente.segundo_apellido', 'paciente.sexo','paciente.fecha_nacimiento', 'paciente.edo_civil', 'nacionalidad.descripcion as nacionalidad', 'zona.zona', 'paciente.telefono', 'paciente.fecha_historia', 'paciente.historia', 'paciente.direccion')
                    ->where('paciente.tipo_cedula', $tipo_cedula)
                    ->where('paciente.cedula', $cedula)->first();
    }

    static public function buscarPacienteHistoria($num_historia)
    {
        return $query = DB::table('paciente')
                    ->join('nacionalidad', 'paciente.id_nacionalidad', '=', 'nacionalidad.id_nacionalidad')
                    ->join('zona', 'paciente.id_zona', '=', 'zona.id_zona')
                    ->select('paciente.tipo_cedula', 'paciente.cedula', 'paciente.id_paciente', 'paciente.primer_nombre', 'paciente.segundo_nombre', 'paciente.primer_apellido', 'paciente.segundo_apellido', 'paciente.sexo','paciente.fecha_nacimiento', 'paciente.edo_civil', 'nacionalidad.descripcion as nacionalidad', 'zona.zona', 'paciente.telefono', 'paciente.fecha_historia', 'paciente.historia', 'paciente.direccion')
                    ->where('paciente.historia', $num_historia)
                    ->first();
    }

    static public function busquedaIngresoHistoria($num_historia)
    {
        return $query = DB::table('paciente')
                    ->join('nacionalidad', 'paciente.id_nacionalidad', '=', 'nacionalidad.id_nacionalidad')
                    ->join('zona', 'paciente.id_zona', '=', 'zona.id_zona')
                    ->join('ingreso', 'ingreso.id_paciente', '=', 'paciente.id_paciente')
                    ->join('servicio', 'servicio.id_servicio', '=', 'ingreso.id_servicio_inicial')
                    ->join('causa_atencion', 'ingreso.id_causa_atencion', '=', 'causa_atencion.id_causa_atencion')
                    ->join('clasif_causa_atencion', 'causa_atencion.id_causa_atencion', '=', 'clasif_causa_atencion.id_causa_atencion')
                    ->join('medico', 'ingreso.cedula_medico', '=', 'medico.cedula')
                    ->select('paciente.tipo_cedula', 'paciente.cedula', 'paciente.id_paciente', 'paciente.primer_nombre', 'paciente.segundo_nombre', 'paciente.primer_apellido', 'paciente.segundo_apellido', 'paciente.sexo','paciente.fecha_nacimiento', 'paciente.edo_civil', 'nacionalidad.descripcion as nacionalidad', 'zona.zona', 'paciente.telefono', 'paciente.fecha_historia', 'paciente.historia', 'paciente.direccion', 'ingreso.id_ingreso', 'ingreso.fecha_ingreso', 'ingreso.id_referencia', 'servicio.id_servicio as servicio', 'servicio.id_tipo_servicio', 'ingreso.id_cama_inicial', 'ingreso.id_causa_atencion', 'ingreso.cod_clasf_causa', DB::raw("CONCAT(medico.nombres, ' ', medico.apellidos) as nombre_medico"))
                    ->where('paciente.historia', $num_historia)
                    ->orderBy('ingreso.id_ingreso', 'desc')
                    ->first();
    }

    static public function busquedaIngreso($num_ingreso)
    {
        return $query = DB::table('paciente')
                    ->join('nacionalidad', 'paciente.id_nacionalidad', '=', 'nacionalidad.id_nacionalidad')
                    ->join('zona', 'paciente.id_zona', '=', 'zona.id_zona')
                    ->join('ingreso', 'ingreso.id_paciente', '=', 'paciente.id_paciente')
                    ->join('servicio', 'servicio.id_servicio', '=', 'ingreso.id_servicio_inicial')
                    ->join('causa_atencion', 'ingreso.id_causa_atencion', '=', 'causa_atencion.id_causa_atencion')
                    ->join('clasif_causa_atencion', 'causa_atencion.id_causa_atencion', '=', 'clasif_causa_atencion.id_causa_atencion')
                    ->join('medico', 'ingreso.cedula_medico', '=', 'medico.cedula')
                    ->select('paciente.tipo_cedula', 'paciente.cedula', 'paciente.id_paciente', 'paciente.primer_nombre', 'paciente.segundo_nombre', 'paciente.primer_apellido', 'paciente.segundo_apellido', 'paciente.sexo','paciente.fecha_nacimiento', 'paciente.edo_civil', 'nacionalidad.descripcion as nacionalidad', 'zona.zona', 'paciente.telefono', 'paciente.fecha_historia', 'paciente.historia', 'paciente.direccion', 'ingreso.id_ingreso', 'ingreso.fecha_ingreso', 'ingreso.id_referencia', 'servicio.id_servicio as servicio', 'servicio.id_tipo_servicio', 'ingreso.id_cama_inicial', 'ingreso.id_causa_atencion', 'ingreso.cod_clasf_causa', DB::raw("CONCAT(medico.nombres, ' ', medico.apellidos) as nombre_medico"))
                    ->where('ingreso.id_ingreso', $num_ingreso)
                    ->first();
    }

    static public function busquedaIngresoCedula($tipo_cedula, $cedula)
    {
        return $query = DB::table('paciente')
                    ->join('nacionalidad', 'paciente.id_nacionalidad', '=', 'nacionalidad.id_nacionalidad')
                    ->join('zona', 'paciente.id_zona', '=', 'zona.id_zona')
                    ->join('ingreso', 'ingreso.id_paciente', '=', 'paciente.id_paciente')
                    ->join('servicio', 'servicio.id_servicio', '=', 'ingreso.id_servicio_inicial')
                    ->join('causa_atencion', 'ingreso.id_causa_atencion', '=', 'causa_atencion.id_causa_atencion')
                    ->join('clasif_causa_atencion', 'causa_atencion.id_causa_atencion', '=', 'clasif_causa_atencion.id_causa_atencion')
                    ->join('medico', 'ingreso.cedula_medico', '=', 'medico.cedula')
                    ->select('paciente.tipo_cedula', 'paciente.cedula', 'paciente.id_paciente', 'paciente.primer_nombre', 'paciente.segundo_nombre', 'paciente.primer_apellido', 'paciente.segundo_apellido', 'paciente.sexo','paciente.fecha_nacimiento', 'paciente.edo_civil', 'nacionalidad.descripcion as nacionalidad', 'zona.zona', 'paciente.telefono', 'paciente.fecha_historia', 'paciente.historia', 'paciente.direccion', 'ingreso.id_ingreso', 'ingreso.fecha_ingreso', 'ingreso.id_referencia', 'servicio.id_servicio as servicio', 'servicio.id_tipo_servicio', 'ingreso.id_cama_inicial', 'ingreso.id_causa_atencion', 'ingreso.cod_clasf_causa', DB::raw("CONCAT(medico.nombres, ' ', medico.apellidos) as nombre_medico"))
                    ->where('paciente.tipo_cedula', $tipo_cedula)
                    ->where('paciente.cedula', $cedula)
                    ->first();
    }

    static public function consultarIdentificacion_noIdentificados()
    {
        return PacienteModel::select('cedula')->where('tipo_cedula', 'I')->orderBy('id_paciente', 'desc')->first();
    }

    static public function consultarPaciente($tipo_cedula, $cedula)
    {
        return PacienteModel::select('*')->where('tipo_cedula', $tipo_cedula)->where('cedula', $cedula)->first();
    }
}
