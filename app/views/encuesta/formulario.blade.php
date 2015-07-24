@extends('layouts.encuesta')

@section('sidebar')
     	@parent
	<h1> {{ $encuesta->nombre }}</h1>
@stop

@section('content')
       

{{ Form::open(array('url' => 'encuesta/crear')) }}
	@foreach($preguntas as $pregunta)
		{{Form::label('nombre', $pregunta->valor)}}
		<br>

		@if($pregunta->tipo == 'boolean')
			{{Form::label('nombre', 'si')}}
			{{ Form::radio('valor', 'si'); }}
			{{Form::label('nombre', 'no')}}
			{{ Form::radio('valor', 'no'); }}
		@elseif($pregunta->tipo == 'opciones1-6')
	   		{{Form::label('nombre', 'Exelente')}}
			{{ Form::radio('valor', '1'); }}
			{{Form::label('nombre', 'Muy Buena')}}
			{{ Form::radio('valor', '2'); }}
			{{Form::label('nombre', 'Buena')}}
			{{ Form::radio('valor', '3'); }}
			{{Form::label('nombre', 'Regular')}}
			{{ Form::radio('valor', '4'); }}
			{{Form::label('nombre', 'Mala')}}
			{{ Form::radio('valor', '5'); }}
			{{Form::label('nombre', 'Ns/Nc')}}
			{{ Form::radio('valor', '6'); }}
	   	@elseif($pregunta->tipo == 'opciones1-3')
	   		{{Form::label('nombre', 'si')}}
			{{ Form::radio('valor', 'si'); }}
			{{Form::label('nombre', 'no')}}
			{{ Form::radio('valor', 'no'); }}
			{{Form::label('nombre', 'nose')}}
			{{ Form::radio('valor', 'ns/sc'); }}
		@elseif($pregunta->tipo == 'text')
			{{ Form::text('name', ''); }}
		@endif
		
		<br>
		<br>
	@endforeach

    	{{Form::submit('Enviar')}}
{{ Form::close() }}


@stop
