<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Cama extends Model
{
    protected $table = 'cama';
    protected $primaryKey= 'id_cama';
    public $timestamps= false;

    static public function consultaEstatus()
    {
        return DB::table('cama')->select('estatus')->distinct()->get();
    }

    static public function consultar_camas($ingreso_hospitalizacion = null, $ingreso_emergencia = null, $servicio = null, $tipo_habitacion= null, $numero_habitacion= null, $codigo_cama= null, $tipo_cama= null, $estatus= null, $numero_ingreso= null)
    {
    	$query = DB::table('cama')
    				->join('tipo_cama', 'cama.id_tipo_cama', '=', 'tipo_cama.id_tipo_cama')
    				->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
    				->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
    				->join('servicio', 'habitacion.id_servicio', '=', 'servicio.id_servicio')
    				->select('cama.codigo_cama as cod_cama', 'cama.estatus', 'tipo_cama.descripcion as tipo_cama', 'habitacion.nro_habitacion as num_hab', 'tipo_habitacion.descripcion as tipo_hab', 'servicio.descripcion as servicio');
        if ($ingreso_hospitalizacion)
            $query->where('cama.tipo_ingreso', '=', $ingreso_hospitalizacion);
        if ($ingreso_hospitalizacion && $ingreso_emergencia)
            $query->orWhere('cama.tipo_ingreso', '=', $ingreso_emergencia);
        else if ($ingreso_emergencia)
            $query->where('cama.tipo_ingreso', '=', $ingreso_emergencia);
        if ($servicio) 
            $query->where('servicio.id_servicio', '=', $servicio);
        if ($tipo_habitacion)
            $query->where('tipo_habitacion.descripcion', 'like', '%'.$tipo_habitacion.'%');
        if ($numero_habitacion)
            $query->where('habitacion.nro_habitacion', 'like', '%'.$numero_habitacion.'%');
        if ($codigo_cama)
            $query->where('cama.codigo_cama', 'like', '%'.$codigo_cama.'%');
        if ($tipo_cama)
            $query->where('tipo_cama.descripcion', 'like', '%'.$tipo_cama.'%');
        if ($estatus)
            $query->where('cama.estatus', '=', $estatus);

         return $query->get();
    }

    static public function consultarCamasServicio($id_servicio, $tipo_habitacion= null, $nro_habitacion= null, $codigo_cama= null, $tipo_cama= null)
    {
        if ($id_servicio) {
            $query = DB::table('cama')
                        ->join('tipo_cama', 'cama.id_tipo_cama', '=', 'tipo_cama.id_tipo_cama')
                        ->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
                        ->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
                        ->join('servicio', 'habitacion.id_servicio', '=', 'servicio.id_servicio')
                        ->select('cama.codigo_cama as cod_cama', 'cama.estatus', 'tipo_cama.descripcion as tipo_cama', 'habitacion.nro_habitacion as num_hab', 'tipo_habitacion.descripcion as tipo_hab', 'servicio.descripcion as servicio', 'cama.id_cama')
                        ->where('servicio.id_servicio', $id_servicio)
                        ->where('cama.estatus', 'DISPONIBLE');
            if ($tipo_habitacion)
                $query->where('tipo_habitacion.descripcion', 'like', '%'.$tipo_habitacion.'%');
            if ($nro_habitacion)
                $query->where('habitacion.nro_habitacion', 'like', '%'.$nro_habitacion.'%');
            if ($codigo_cama)
                $query->where('cama.codigo_cama', 'like', '%'.$codigo_cama.'%');
            if ($tipo_cama)
                $query->where('tipo_cama.descripcion', 'like', '%'.$tipo_cama.'%');

            return $query->get();
        } else {
            $query = DB::table('cama')
                        ->join('tipo_cama', 'cama.id_tipo_cama', '=', 'tipo_cama.id_tipo_cama')
                        ->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
                        ->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
                        ->join('servicio', 'habitacion.id_servicio', '=', 'servicio.id_servicio')
                        ->select('cama.codigo_cama as cod_cama', 'cama.estatus', 'tipo_cama.descripcion as tipo_cama', 'habitacion.nro_habitacion as num_hab', 'tipo_habitacion.descripcion as tipo_hab', 'servicio.descripcion as servicio', 'cama.id_cama');
            if ($tipo_habitacion)
                $query->where('tipo_habitacion.descripcion', 'like', '%'.$tipo_habitacion.'%');
            if ($nro_habitacion)
                $query->where('habitacion.nro_habitacion', 'like', '%'.$nro_habitacion.'%');
            if ($codigo_cama)
                $query->where('cama.codigo_cama', 'like', '%'.$codigo_cama.'%');
            if ($tipo_cama)
                $query->where('tipo_cama.descripcion', 'like', '%'.$tipo_cama.'%');

            return $query->get();
        }
    }

    static public function consultarCamasOcupadas($tipo_habitacion = null, $nro_habitacion= null, $codigo_cama= null, $tipo_cama= null)
    {
        $query = DB::table('cama')
                    ->join('tipo_cama', 'cama.id_tipo_cama', '=', 'tipo_cama.id_tipo_cama')
                    ->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
                    ->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
                    ->join('servicio', 'habitacion.id_servicio', '=', 'servicio.id_servicio')
                    ->select('cama.codigo_cama as cod_cama', 'cama.estatus', 'tipo_cama.descripcion as tipo_cama', 'habitacion.nro_habitacion as num_hab', 'tipo_habitacion.descripcion as tipo_hab', 'servicio.descripcion as servicio', 'cama.id_cama')
                    ->where('cama.estatus', 'OCUPADO');
        if ($tipo_habitacion)
            $query->where('tipo_habitacion.descripcion', 'like', '%'.$tipo_habitacion.'%');
        if ($nro_habitacion)
            $query->where('habitacion.nro_habitacion', 'like', '%'.$nro_habitacion.'%');
        if ($codigo_cama)
            $query->where('cama.codigo_cama', 'like', '%'.$codigo_cama.'%');
        if ($tipo_cama)
            $query->where('tipo_cama.descripcion', 'like', '%'.$tipo_cama.'%');

        return $query->get();
    }

    static public function actualizarEstatusCama($id_cama, $estatus)
    {
        Cama::where('id_cama', $id_cama)->update(['estatus' => $estatus]);
    }

    /*
    static public function consultarCamasDisponibles($tipo_habitacion = null, $nro_habitacion= null, $codigo_cama= null, $tipo_cama= null)
    {
        $query = DB::table('cama')
                    ->join('tipo_cama', 'cama.id_tipo_cama', '=', 'tipo_cama.id_tipo_cama')
                    ->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
                    ->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
                    ->join('servicio', 'habitacion.id_servicio', '=', 'servicio.id_servicio')
                    ->select('cama.codigo_cama as cod_cama', 'cama.estatus', 'tipo_cama.descripcion as tipo_cama', 'habitacion.nro_habitacion as num_hab', 'tipo_habitacion.descripcion as tipo_hab', 'servicio.descripcion as servicio', 'cama.id_cama')
                    ->where('cama.estatus', 'DISPONIBLE');
        if ($tipo_habitacion)
            $query->where('tipo_habitacion.descripcion', 'like', '%'.$tipo_habitacion.'%');
        if ($nro_habitacion)
            $query->where('habitacion.nro_habitacion', 'like', '%'.$nro_habitacion.'%');
        if ($codigo_cama)
            $query->where('cama.codigo_cama', 'like', '%'.$codigo_cama.'%');
        if ($tipo_cama)
            $query->where('tipo_cama.descripcion', 'like', '%'.$tipo_cama.'%');

        return $query->get();
    }
    */
}
