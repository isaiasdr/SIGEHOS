<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class TrasladoModel extends Model
{
    protected $table = 'traslado';
    protected $primaryKey = 'id_traslado';
    public $timestamps= false;

    static public function crearSolicitud($fecha, $nro_renglon, $id_cama, $id_ingreso, $id_habitacion, $id_servicio_act, $id_servicio_solic, $id_tipo_traslado)
    {
    	return TrasladoModel::insertGetId([
    		'fecha_estatus' => $fecha,
    		'fecha_solicitud' => $fecha,
    		'nro_renglon' => $nro_renglon, 
    		'id_cama_act' => $id_cama,
            'id_cama_solic' => $id_cama, 
   			'id_ingreso' => $id_ingreso, 
   			'id_tipo_hab_solic' => $id_habitacion, 
   			'id_estatus' => 10, 
   			'id_servicio_act' => $id_servicio_act, 
    		'id_servicio_solic' => $id_servicio_solic, 
    		'id_tipo_traslado' => $id_tipo_traslado
    	], 'id_traslado');
    }

    static public function consultarCantidadTraslados($id_ingreso)
    {
    	return TrasladoModel::select('nro_renglon')->where('id_ingreso', $id_ingreso)->where('id_estatus', 10)->get();
    }

    static public function consultarTrasladoActivo($id_ingreso)
    {
    	return TrasladoModel::select('id_ingreso')->where('id_estatus', 11)->get();
    }

    static public function buscarTraslado($id_traslado)
    {
        return TrasladoModel::select('traslado.fecha_solicitud', 'traslado.nro_renglon', 'estatus.descripcion as estatus', 'tipo_traslado.descripcion as tipo_traslado', 'servicio.descripcion as servicio', 'servicio.id_servicio', 'tipo_habitacion.descripcion as tipo_habitacion')
                            ->join('tipo_habitacion', 'tipo_habitacion.id_tipo_habitacion', '=', 'traslado.id_tipo_hab_solic')
                            ->join('tipo_traslado', 'tipo_traslado.id_tipo_traslado', '=', 'traslado.id_tipo_traslado')
                            ->join('estatus', 'estatus.id_estatus', '=', 'traslado.id_estatus')
                            ->join('servicio', 'servicio.id_servicio', '=', 'traslado.id_servicio_solic')
                            ->where('traslado.id_traslado', $id_traslado)->first();
    }

    static public function consultarTraslados()
    {
        return TrasladoModel::select('traslado.nro_renglon', 'traslado.fecha_solicitud as fecha', 'traslado.id_ingreso', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), 'paciente.sexo')
                            ->join('ingreso', 'ingreso.id_ingreso', '=', 'traslado.id_ingreso')
                            ->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
                            ->where('traslado.id_estatus', 10)
                            ->get();
    }

    static public function consultarEstatusTraslado($id_traslado)
    {
        return TrasladoModel::select('traslado.*', 'ingreso.id_paciente')
                            ->join('ingreso', 'ingreso.id_ingreso', '=', 'traslado.id_ingreso')
                            ->where('id_traslado', $id_traslado)
                            ->where('id_estatus', 10)
                            ->first();
    }

    static public function aprobarTraslado($id_traslado, $fecha, $id_cama_solic, $id_servicio, $id_ingreso)
    {
        Ingreso::where('id_ingreso', $id_ingreso)->update(['id_servicio' => $id_servicio]);

        TrasladoModel::where('id_traslado', $id_traslado)->update(['id_estatus' => 11, 'fecha_estatus'=> $fecha, 'id_cama_act'=> $id_cama_solic]);
    }
}
