@extends('layouts.encuesta')

@section('sidebar')
     	@parent
	
@stop

@section('content')
       <h1> {{ $encuesta->nombre }}</h1>

       <div class="form">
       <div class="form-group">
       	<form role="form" method="POST"  accept-charset="UTF-8" action= {{ URL::route('encuesta') }}>
	
       	@foreach($preguntas as $pregunta)
	
		<label for="role">{{ $pregunta->valor}}</label>
		<br>

		@if($pregunta->tipo == 'boolean')
			<label for="role">Si</label>
			<input type="radio" name={{ 'pregunta'.$pregunta->id }} value="si">
			<label for="role">No</label>
			<input type="radio" name={{ 'pregunta'.$pregunta->id }} value="no">
		@elseif($pregunta->tipo == 'opciones1-6')
			<label for="role">Exelente</label>
			<input type="radio" name={{ 'pregunta'.$pregunta->id }} value="exelente">
			<label for="role">Muy Buena</label>
			<input type="radio" name={{ 'pregunta'.$pregunta->id }} value="muy buena">
			<label for="role">Buena</label>
			<input type="radio" name={{ 'pregunta'.$pregunta->id }} value="buena">
			<label for="role">Regular</label>
			<input type="radio" name={{ 'pregunta'.$pregunta->id }} value="regular">
			<label for="role">Mala</label>
			<input type="radio" name={{ 'pregunta'.$pregunta->id }} value="mala">
			<label for="role">Ns/Nc</label>
			<input type="radio" name={{ 'pregunta'.$pregunta->id }} value="ns/nc">
	   	@elseif($pregunta->tipo == 'opciones1-3')
	   		<label for="role">Si</label>
			<input type="radio"name={{ 'pregunta'.$pregunta->id }} value="no">
			<label for="role">No</label>
			<input type="radio" name={{ 'pregunta'.$pregunta->id }} value="si">
			<label for="role">Ns/Nc</label>
			<input type="radio" name={{ 'pregunta'.$pregunta->id }} value="ns/nc">
		@elseif($pregunta->tipo == 'text')
			<textarea  name={{ 'pregunta'.$pregunta->id }} ></textarea>
		@endif
		<br>
		<br>
	@endforeach
	<button type="submit">enviar</button>

	</form>

	<hr>

       <div class="form">
       <div class="form-group">
       	
       </div>
</div>



@stop
