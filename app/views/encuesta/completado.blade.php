@extends('layouts.encuesta')

@section('sidebar')
     	@parent

@stop

@section('content')
       
	<div class="mensaje">
		<h1 class="ok text-uppercase">GRACIAS POR COMPLETAR LA ENCUESTA</h1>
		<p>{{ $encuesta->nombre }}</p>
	</div>

@stop
