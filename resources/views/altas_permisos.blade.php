@extends('master')
@section('head')
	<meta name="csrf_token" id="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title', 'Altas y Permisos')
@section('content')
	<div id="contenido">
		<altas-permisos :baseurl= '@json(url('/'))' :acceso_total='@json(session('acceso_total'))'></altas-permisos>
	</div>
@endsection