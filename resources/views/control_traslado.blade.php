@extends('master')
@section('head')
	<meta name="csrf_token" id="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title', 'Control de Traslado')
@section('content')
	<div id="contenido">
		<control-traslado :baseurl= '@json(url('/'))' :acceso_total='@json(session('acceso_total'))'></control-traslado>
	</div>
@endsection