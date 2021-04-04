<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\IngresoExport;
use App\Exports\TrasladoExport;
use App\Exports\CamaExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;

class ReportesController extends Controller
{
    public function index()
    {
    	if (empty(session('id'))) {
            return redirect('login')->withErrors(['message' => 'Debe iniciar sesion']);
        }
    	return view('reportes');
    }

    public function reporteIngresos(Request $request)
    {
    	$params= $request->input();

    	$temp = Carbon::create($params['fecha_hasta']);
    	$temp->addDay();
    	$params['fecha_hasta'] = $temp;

    	$date= Carbon::now();
	    $fecha_actual= $date->toDateTimeString();

	    if ($params['check_h'] == "true" ||  $params['check_e'] == "true") {
	    	return Excel::download(new IngresoExport($params['fecha_desde'], $params['fecha_hasta'], $params['check_h'], $params['check_e']), 'Ingresos_SIGEHOS_'.$fecha_actual.'.xlsx');
	    } else {
    		return redirect()->back()->withErrors(['message' => 'Debe seleccionar al menos 1 tipo de admision para generar el reporte.']);
    	}
    }

    public function reporteTraslados(Request $request)
    {
    	$params= $request->input();

    	$temp = Carbon::create($params['fecha_hasta']);
    	$temp->addDay();
    	$params['fecha_hasta'] = $temp;

    	$date= Carbon::now();
	    $fecha_actual= $date->toDateTimeString();

	    if ($params['check_h'] == "true" ||  $params['check_e'] == "true") {
	    	return Excel::download(new trasladoExport($params['fecha_desde'], $params['fecha_hasta'], $params['check_h'], $params['check_e']), 'Ingresos_SIGEHOS_'.$fecha_actual.'.xlsx');
	    } else {
    		return redirect()->back()->withErrors(['message' => 'Debe seleccionar al menos 1 tipo de admision para generar el reporte.']);
    	}
    }

    public function reporteCamas(Request $request)
    {
    	$params= $request->input();

    	$temp = Carbon::create($params['fecha_hasta']);
    	$temp->addDay();
    	$params['fecha_hasta'] = $temp;

    	$date= Carbon::now();
	    $fecha_actual= $date->toDateTimeString();

	    if ($params['check_h'] == "true" ||  $params['check_e'] == "true") {
	    	return Excel::download(new CamaExport($params['fecha_desde'], $params['fecha_hasta'], $params['check_h'], $params['check_e']), 'Ingresos_SIGEHOS_'.$fecha_actual.'.xlsx');
	    } else {
    		return redirect()->back()->withErrors(['message' => 'Debe seleccionar al menos 1 tipo de admision para generar el reporte.']);
    	}
    }
}