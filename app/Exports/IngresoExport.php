<?php

namespace App\Exports;

use App\Ingreso;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IngresoExport implements FromView
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
    		return view('exports.ingresos', [
    		    'ingresos' => Ingreso::select('cama.codigo_cama', 'ingreso.ingreso', 'paciente.tipo_cedula', 'paciente.cedula', 'paciente.historia', 'paciente.fecha_nacimiento', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), 'paciente.sexo', 'servicio.id_servicio', 'servicio.descripcion as servicio_inicial', 'servicio_actual.descripcion as servicio_actual', 'tipo_servicio.descripcion as tipo_servicio', 'tipo_habitacion.codigo', 'tipo_habitacion.descripcion as tipo_habitacion', 'medico.cedula as cedula_medico', DB::raw("CONCAT(medico.nombres, ' ', medico.apellidos) as nombre_medico"))
    		                ->join('cama', 'cama.id_cama', '=', 'ingreso.id_cama')
    		                ->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
    		                ->join('servicio', 'servicio.id_servicio', '=', 'ingreso.id_servicio_inicial')
    		                ->leftJoin('servicio as servicio_actual', 'servicio_actual.id_servicio', '=', 'ingreso.id_servicio')
    		                ->join('tipo_servicio', 'tipo_servicio.id_tipo_servicio', '=', 'servicio.id_tipo_servicio')
    		                ->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
    		                ->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
    		                ->leftJoin('medico', 'medico.cedula', '=', 'ingreso.cedula_medico')
    		                ->where('ingreso.fecha_ingreso', '>=', $this->fecha_inicio)
    						->where('ingreso.fecha_ingreso', '<=', $this->fecha_fin)
    						->get()
    		]);
    	} elseif ($this->emergencia) {
    		return view('exports.ingresos', [
    		    'ingresos' => Ingreso::select('cama.codigo_cama', 'ingreso.ingreso', 'paciente.tipo_cedula', 'paciente.cedula', 'paciente.historia', 'paciente.fecha_nacimiento', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), 'paciente.sexo', 'servicio.id_servicio', 'servicio.descripcion as servicio_inicial', 'servicio_actual.descripcion as servicio_actual', 'tipo_servicio.descripcion as tipo_servicio', 'tipo_habitacion.codigo', 'tipo_habitacion.descripcion as tipo_habitacion', 'medico.cedula as cedula_medico', DB::raw("CONCAT(medico.nombres, ' ', medico.apellidos) as nombre_medico"))
                            ->join('cama', 'cama.id_cama', '=', 'ingreso.id_cama')
                            ->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
                            ->join('servicio', 'servicio.id_servicio', '=', 'ingreso.id_servicio_inicial')
                            ->leftJoin('servicio as servicio_actual', 'servicio_actual.id_servicio', '=', 'ingreso.id_servicio')
                            ->join('tipo_servicio', 'tipo_servicio.id_tipo_servicio', '=', 'servicio.id_tipo_servicio')
                            ->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
                            ->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
                            ->leftJoin('medico', 'medico.cedula', '=', 'ingreso.cedula_medico')
                            ->where('ingreso.fecha_ingreso', '>=', $this->fecha_inicio)
                            ->where('ingreso.fecha_ingreso', '<=', $this->fecha_fin)
    						->where('tipo_servicio.descripcion', 'EMER')
    						->get()
    		]);
    	} elseif ($this->hospitalizacion) {
    		return view('exports.ingresos', [
    		    'ingresos' => Ingreso::select('cama.codigo_cama', 'ingreso.ingreso', 'paciente.tipo_cedula', 'paciente.cedula', 'paciente.historia', 'paciente.fecha_nacimiento', DB::raw("CONCAT(paciente.primer_nombre, ' ', paciente.segundo_nombre) as nombres"), DB::raw("CONCAT(paciente.primer_apellido, ' ', paciente.segundo_apellido) as apellidos"), 'paciente.sexo', 'servicio.id_servicio', 'servicio.descripcion as servicio_inicial', 'servicio_actual.descripcion as servicio_actual', 'tipo_servicio.descripcion as tipo_servicio', 'tipo_habitacion.codigo', 'tipo_habitacion.descripcion as tipo_habitacion', 'medico.cedula as cedula_medico', DB::raw("CONCAT(medico.nombres, ' ', medico.apellidos) as nombre_medico"))
                            ->join('cama', 'cama.id_cama', '=', 'ingreso.id_cama')
                            ->join('paciente', 'paciente.id_paciente', '=', 'ingreso.id_paciente')
                            ->join('servicio', 'servicio.id_servicio', '=', 'ingreso.id_servicio_inicial')
                            ->leftJoin('servicio as servicio_actual', 'servicio_actual.id_servicio', '=', 'ingreso.id_servicio')
                            ->join('tipo_servicio', 'tipo_servicio.id_tipo_servicio', '=', 'servicio.id_tipo_servicio')
                            ->join('habitacion', 'cama.id_habitacion', '=', 'habitacion.id_habitacion')
                            ->join('tipo_habitacion', 'habitacion.id_tipo_habitacion', '=', 'tipo_habitacion.id_tipo_habitacion')
                            ->leftJoin('medico', 'medico.cedula', '=', 'ingreso.cedula_medico')
                            ->where('ingreso.fecha_ingreso', '>=', $this->fecha_inicio)
                            ->where('ingreso.fecha_ingreso', '<=', $this->fecha_fin)
    						->where('tipo_servicio.descripcion', 'HOSP')
    						->get()
    		]);
    	}
    }
}
