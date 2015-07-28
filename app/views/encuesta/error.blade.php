@extends('layouts.encuesta')

@section('sidebar')
     	@parent
	
@stop

@section('content')

	<div class="mensaje">
		<p>{{ $usuario->email }}</p>
		<h1 class="error text-uppercase"> {{ $mensaje }}</h1>
		<p>{{ $encuesta->nombre }}</p>
	</div>
       
@stop
