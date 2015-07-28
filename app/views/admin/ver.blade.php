@extends('layouts.master')

@section('sidebar')
     @parent
     <p>  {{ HTML::link('lista-encuestas', 'Volver al Listado de Encuestas'); }}</p>
@stop

@section('content')

	<h4>Usuario: {{ $usuarios->email }}</h4>
	<h4>IP: {{ $usuarios->ip}}</h4>
     	@foreach($respuestas as $respuesta)
        		<?php  
       			$pregunta = $respuesta->idEncuestaPregunta;
      			$preguntas = DB::table('pregunta')->where('id', $pregunta)->first();
	        	?>
	       	 <li>  {{ $preguntas->valor }}</li>
	        	<li>  {{ $respuesta->valor }}</li>
	        	<br>
	@endforeach

@stop