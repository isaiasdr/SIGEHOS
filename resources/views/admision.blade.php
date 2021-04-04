@extends('master')
@section('head')
	<meta name="csrf_token" id="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title', 'Registrar Admision')
@section('content')
	<div id="contenido">
		<admision-paciente :baseurl= '@json(url('/'))' :acceso_total='@json(session('acceso_total'))'></admision-paciente>
	</div>
@endsection