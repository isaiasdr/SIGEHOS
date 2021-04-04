@extends('master')
@section('head')
	<meta name="csrf_token" id="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title', 'Solicitud de Traslado')
@section('content')
	<div id="contenido">
		<solicitud-traslado :baseurl= '@json(url('/'))' :acceso_total='@json(session('acceso_total'))'></solicitud-traslado>
	</div>
@endsection