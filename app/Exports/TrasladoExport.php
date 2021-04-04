<?php

namespace App\Exports;

use App\TrasladoModel;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TrasladoExport implements FromView
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
    		return view('exports.traslados', [
	            'traslados' => TrasladoModel::select('ingreso.id_ingreso as ingreso', 'paciente.historia', 'paciente.tipo_cedula', 'paciente.cedula', 'paciente.historia', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), 'paciente.sexo', 'servicio_actual.descripcion as servicio_ante', 'servicio_traslado.descripcion as servicio_tras', 'cama_actual.codigo_cama as codigo_cama_ante', 'cama_traslado.codigo_cama as codigo_cama_tras', 'traslado.nro_renglon as renglon')
	            			->join('ingreso', 'ingreso.id_ingreso', '=', 'traslado.id_ingreso')
	            			->leftJoin('servicio as servicio_actual', 'servicio_actual.id_servicio', '=', 'traslado.id_servicio_act')
	            			->leftJoin('servicio as servicio_traslado', 'servicio_traslado.id_servicio', '=', 'traslado.id_servicio_solic')
	            			->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
	            			->leftJoin('cama as cama_actual', 'cama_actual.id_cama', '=', 'traslado.id_cama_act')
	            			->leftJoin('cama as cama_traslado', 'cama_traslado.id_cama', '=', 'traslado.id_cama_solic')
	                        ->where('traslado.fecha_estatus', '>=', $this->fecha_inicio)
	        				->where('traslado.fecha_estatus', '<=', $this->fecha_fin)
	        				->where('traslado.id_estatus', 11)
	        				->get()
	        ]);
    	} elseif ($this->emergencia) {
    		return view('exports.traslados', [
	            'traslados' => TrasladoModel::select('ingreso.id_ingreso as ingreso', 'paciente.historia', 'paciente.tipo_cedula', 'paciente.cedula', 'paciente.historia', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), 'paciente.sexo', 'servicio_actual.descripcion as servicio_ante', 'servicio_traslado.descripcion as servicio_tras', 'cama_actual.codigo_cama as codigo_cama_ante', 'cama_traslado.codigo_cama as codigo_cama_tras', 'traslado.nro_renglon as renglon')
	            			->join('ingreso', 'ingreso.id_ingreso', '=', 'traslado.id_ingreso')
	            			->leftJoin('servicio as servicio_actual', 'servicio_actual.id_servicio', '=', 'traslado.id_servicio_act')
	            			->leftJoin('servicio as servicio_traslado', 'servicio_traslado.id_servicio', '=', 'traslado.id_servicio_solic')
	            			->leftJoin('tipo_servicio', 'tipo_servicio.id_tipo_servicio', '=', 'servicio_actual.id_tipo_servicio')
	            			->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
	            			->leftJoin('cama as cama_actual', 'cama_actual.id_cama', '=', 'traslado.id_cama_act')
	            			->leftJoin('cama as cama_traslado', 'cama_traslado.id_cama', '=', 'traslado.id_cama_solic')
	                        ->where('traslado.fecha_estatus', '>=', $this->fecha_inicio)
	        				->where('traslado.fecha_estatus', '<=', $this->fecha_fin)
	        				->where('traslado.id_estatus', 11)
	        				->where('tipo_servicio.descripcion', 'EMER')
	        				->get()
	        ]);
    	} elseif ($this->hospitalizacion) {
    		return view('exports.traslados', [
	            'traslados' => TrasladoModel::select('ingreso.id_ingreso as ingreso', 'paciente.historia', 'paciente.tipo_cedula', 'paciente.cedula', 'paciente.historia', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), 'paciente.sexo', 'servicio_actual.descripcion as servicio_ante', 'servicio_traslado.descripcion as servicio_tras', 'cama_actual.codigo_cama as codigo_cama_ante', 'cama_traslado.codigo_cama as codigo_cama_tras', 'traslado.nro_renglon as renglon')
	            			->join('ingreso', 'ingreso.id_ingreso', '=', 'traslado.id_ingreso')
	            			->leftJoin('servicio as servicio_actual', 'servicio_actual.id_servicio', '=', 'traslado.id_servicio_act')
	            			->leftJoin('servicio as servicio_traslado', 'servicio_traslado.id_servicio', '=', 'traslado.id_servicio_solic')
	            			->leftJoin('tipo_servicio', 'tipo_servicio.id_tipo_servicio', '=', 'servicio_actual.id_tipo_servicio')
	            			->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
	            			->leftJoin('cama as cama_actual', 'cama_actual.id_cama', '=', 'traslado.id_cama_act')
	            			->leftJoin('cama as cama_traslado', 'cama_traslado.id_cama', '=', 'traslado.id_cama_solic')
	                        ->where('traslado.fecha_estatus', '>=', $this->fecha_inicio)
	        				->where('traslado.fecha_estatus', '<=', $this->fecha_fin)
	        				->where('traslado.id_estatus', 11)
	        				->where('tipo_servicio.descripcion', 'HOSP')
	        				->get()
	        ]);
    	}
    }
}
