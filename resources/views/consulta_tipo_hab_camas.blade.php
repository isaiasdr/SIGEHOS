@extends('master')
@section('title', 'Consulta tipos habitaciones y camas')
@section('content')
	<div id="contenido">
		<consulta-tipos :baseurl= '@json(url('/'))'></consulta-tipos>
	</div>
@endsection