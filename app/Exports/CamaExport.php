<?php

namespace App\Exports;

use App\Cama;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CamaExport implements FromView
{

	protected $fecha_inicio;
	protected $fecha_fin;
	protected $hospitalizacion;
	protected $emergencia;

	function __construct($fecha_inicio, $fecha_fin, $hospitalizacion = null, $emergencia = null)
	{
		$this->fecha_inicio = $fecha_inicio;
		$this->fecha_fin = $fecha_fin;

		if ($emergencia == "true") {
			$this->emergencia = 1;
		} else {
			$this->emergencia = 0;
		}

		if ($hospitalizacion == "true") {
			$this->hospitalizacion = 2;
		} else {
			$this->hospitalizacion = 0;
		}
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
    	if ($this->emergencia && $this->hospitalizacion) {
    		return view('exports.camas', [
	            'camas' => Cama::select('cama.codigo_cama', 'cama.estatus', 'habitacion.nro_habitacion', 'tipo_habitacion.descripcion as tipo_habitacion', 'tipo_cama.descripcion as tipo_cama', 'tipo_cama.codigo as codigo_tipo_cama', 'servicio.descripcion as servicio')
	            			->join('tipo_cama', 'tipo_cama.id_tipo_cama', '=', 'cama.id_tipo_cama')
	            			->join('habitacion', 'habitacion.id_habitacion', '=', 'cama.id_habitacion')
	            			->join('tipo_habitacion', 'tipo_habitacion.id_tipo_habitacion', '=', 'habitacion.id_tipo_habitacion')
	            			->join('servicio', 'servicio.id_servicio', '=', 'habitacion.id_servicio')
	                        ->where('cama.fecha_estatus', '>=', $this->fecha_inicio)
	        				->where('cama.fecha_estatus', '<=', $this->fecha_fin)
	        				->get()
	        ]);
    	} elseif ($this->emergencia) {
    		return view('exports.camas', [
	            'camas' => Cama::select('cama.codigo_cama', 'cama.estatus', 'habitacion.nro_habitacion', 'tipo_habitacion.descripcion as tipo_habitacion', 'tipo_cama.descripcion as tipo_cama', 'tipo_cama.codigo as codigo_tipo_cama', 'servicio.descripcion as servicio')
	            			->join('tipo_cama', 'tipo_cama.id_tipo_cama', '=', 'cama.id_tipo_cama')
	            			->join('habitacion', 'habitacion.id_habitacion', '=', 'cama.id_habitacion')
	            			->join('tipo_habitacion', 'tipo_habitacion.id_tipo_habitacion', '=', 'habitacion.id_tipo_habitacion')
	            			->join('servicio', 'servicio.id_servicio', '=', 'habitacion.id_servicio')
	                        ->where('cama.fecha_estatus', '>=', $this->fecha_inicio)
	        				->where('cama.fecha_estatus', '<=', $this->fecha_fin)
	        				->where('cama.tipo_ingreso', '=', 'E')
	        				->get()
	        ]);
    	} elseif ($this->hospitalizacion) {
    		return view('exports.camas', [
	            'camas' => Cama::select('cama.codigo_cama', 'cama.estatus', 'habitacion.nro_habitacion', 'tipo_habitacion.descripcion as tipo_habitacion', 'tipo_cama.descripcion as tipo_cama', 'tipo_cama.codigo as codigo_tipo_cama', 'servicio.descripcion as servicio')
	            			->join('tipo_cama', 'tipo_cama.id_tipo_cama', '=', 'cama.id_tipo_cama')
	            			->join('habitacion', 'habitacion.id_habitacion', '=', 'cama.id_habitacion')
	            			->join('tipo_habitacion', 'tipo_habitacion.id_tipo_habitacion', '=', 'habitacion.id_tipo_habitacion')
	            			->join('servicio', 'servicio.id_servicio', '=', 'habitacion.id_servicio')
	                        ->where('cama.fecha_estatus', '>=', $this->fecha_inicio)
	        				->where('cama.fecha_estatus', '<=', $this->fecha_fin)
	        				->where('cama.tipo_ingreso', '=', 'H')
	        				->get()
	        ]);
    	}
    }
}
