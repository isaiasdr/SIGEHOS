<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'LoginController@index');

Route::get('/home', 'HomeController@index');

//rutas del login
Route::get('/logout', 'UsuariosController@logout');
Route::post('/validateLogin', 'UsuariosController@login');

//rutas de admision
Route::get('/admision', 'AdmisionController@index');
Route::get('/admision/numIngreso', 'AdmisionController@getNumIngreso');
Route::get('/admision/fecha', 'AdmisionController@getCurrentDate');
Route::get('/admision/camas', 'AdmisionController@camas');
Route::get('/admision/medicos', 'AdmisionController@medicos');
Route::get('/admision/diagnosticos', 'AdmisionController@diagnosticos');
Route::get('/admision/causas_atencion', 'AdmisionController@causas_atencion');
Route::get('/admision/clasificaciones_causas', 'AdmisionController@clasificaciones_causas');
Route::get('/admision/referencias', 'AdmisionController@referencias');
Route::post('/admision/busquedaPaciente', 'AdmisionController@busquedaPaciente');
Route::post('/admision/busquedaPacienteHistoria', 'AdmisionController@busquedaPacienteHistoria');
Route::post('/admision/busquedaIngresoHistoria', 'AdmisionController@busquedaIngresoHistoria');
Route::post('/admision/busquedaIngreso', 'AdmisionController@busquedaIngreso');
Route::post('/admision/busquedaIngresoCedula', 'AdmisionController@busquedaIngresoCedula');
Route::post('/admision/registrar', 'AdmisionController@registrarAdmision');
Route::post('/admision/registrarEmergencia', 'AdmisionController@registrarAdmisionEmergencia');
Route::post('/admision/modificar', 'AdmisionController@modificarAdmision');

//rutas de consultas de habitacion y cama
Route::get('/consulta/tipo_hab_camas', 'Consultas_admisionController@tipo_hab_camas');
Route::get('/consulta/tipo_hab', 'Consultas_admisionController@consulta_tipo_hab');
Route::get('/consulta/tipo_camas', 'Consultas_admisionController@consulta_tipo_camas');
Route::get('/consulta/cama', 'Consultas_admisionController@consulta_camas');
Route::get('/consulta/servicios', 'Consultas_admisionController@servicios');
Route::get('/consulta/estatus', 'Consultas_admisionController@estatus');
Route::get('/consulta/camas', 'CamasController@index');

//rutas de paciente
Route::get('/paciente', 'PacienteController@index');
Route::get('/paciente/profesion', 'PacienteController@consultaProfesiones');
Route::get('/paciente/religion', 'PacienteController@consultaReligiones');
Route::get('/paciente/ocupacion', 'PacienteController@consultaOcupaciones');
Route::get('/paciente/zona', 'PacienteController@consultaZonas');
Route::get('/paciente/nacionalidad', 'PacienteController@consultaNacionalidades');
Route::get('/paciente/parentesco', 'PacienteController@consultaParentescos');
Route::get('/paciente/estado_civil', 'PacienteController@consultaEstadosCiviles');
Route::get('/paciente/date', 'PacienteController@getCurrentDate');
Route::get('/paciente/numHistoria', 'PacienteController@getNumHistoria');
Route::get('/paciente/consultar', 'PacienteController@consultarPaciente');
Route::get('/paciente/consultarAcompañantes', 'PacienteController@consultarAcompañantes');
Route::get('/paciente/generarIdenticacion', 'PacienteController@generar_identificacion');
Route::post('/paciente/registrar', 'PacienteController@registrar_paciente');
Route::post('/paciente/registrarEmergencia', 'PacienteController@registrarPacienteEmergencia');

//rutas de solicitud de traslado
Route::get('/traslado/solicitud', 'TrasladoController@index');
Route::get('/traslado/solicitud/fecha', 'TrasladoController@getCurrentDate');
Route::get('/traslado/solicitud/camas', 'TrasladoController@camas');
Route::get('/traslado/solicitud/ingreso_cama', 'TrasladoController@buscarIngresoCama');
Route::get('/traslado/solicitud/ingreso', 'TrasladoController@buscarIngreso');
Route::get('/traslado/solicitud/diagnosticos', 'TrasladoController@buscarDiagnosticosPaciente');
Route::get('/traslado/solicitud/tipos_traslado', 'TrasladoController@tiposTraslados');
Route::get('/traslado/solicitud/tipos_habitaciones', 'TrasladoController@tiposHabitaciones');
Route::post('/traslado/solicitud/registrar', 'TrasladoController@registrarSolicitudTraslado');

//rutas de control de traslado
Route::get('/traslado/control', 'TrasladoController@controlTraslado');
Route::get('/traslado/control/ingreso', 'TrasladoController@buscarIngresoControl');
Route::get('/traslado/control/camas', 'TrasladoController@camasControl');
Route::get('/traslado/control/diagnosticos', 'TrasladoController@buscarDiagnosticosPaciente');
Route::get('/traslado/control/traslado', 'TrasladoController@buscarTraslado');
Route::get('/traslado/control/traslados', 'TrasladoController@consultarTraslados');
Route::get('/traslado/control/fecha', 'TrasladoController@getCurrentDate');
Route::post('/traslado/control/procesar', 'TrasladoController@procesarTraslado');

//rutas de altas y permisos
Route::get('/altas', 'AltasController@index');
Route::get('/altas/consulta', 'AltasController@buscarPaciente');
Route::get('/altas/causas_egreso', 'AltasController@causasEgreso');
Route::get('/altas/motivos_permiso', 'AltasController@motivosPermiso');
Route::get('/altas/numero_permiso', 'AltasController@obtenerNumeroPermiso');
Route::post('altas/registrarAlta', 'AltasController@registrarAlta');
Route::post('altas/registrarPermiso', 'AltasController@registrarPermiso');

//rutas de reportes
Route::get('/reportes', 'ReportesController@index');
Route::get('/reportes/ingresos', 'ReportesController@reporteIngresos');
Route::get('/reportes/traslados', 'ReportesController@reporteTraslados');
Route::get('/reportes/camas', 'ReportesController@reporteCamas');

Route::get('/prueba', 'PacienteController@prueba');