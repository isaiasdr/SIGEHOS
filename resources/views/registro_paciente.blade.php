@extends('master')
@section('head')
	<meta name="csrf_token" id="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title', 'Registro Pacientes')
@section('content')
	<div id="contenido">
		<registro-paciente :baseurl= '@json(url('/'))' :acceso_total='@json(session('acceso_total'))'></registro-paciente>
	</div>
@endsection