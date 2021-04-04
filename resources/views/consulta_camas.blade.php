@extends('master')
@section('title', 'Consulta de Camas')
@section('content')
	<div id="contenido">
		<consulta-camas :baseurl= '@json(url('/'))'></consulta-camas>
	</div>
@endsection