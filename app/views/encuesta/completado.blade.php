@extends('layouts.encuesta')

@section('sidebar')
     	@parent
	<h1> {{ $encuesta->nombre }}</h1>
@stop

@section('content')
       
GRACIAS POR COMPLETAR LA ENCUESTA

		@foreach($respuesta as $respuestas)
	

				{{ $respuestas->valor }}
	
		@endforeach

@stop
