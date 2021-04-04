@extends('master')
@section('head')
	<meta name="csrf_token" id="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('title', 'Reportes')

@section('content')
	<div id="contenido">
		@if($errors->any())
			<reportes :baseurl= '@json(url('/'))' :acceso_total='@json(session('acceso_total'))' :message='@json($errors->first())'></reportes>
        @else
        	<reportes :baseurl= '@json(url('/'))' :acceso_total='@json(session('acceso_total'))'></reportes>
       	@endif

		
	</div>
@endsection