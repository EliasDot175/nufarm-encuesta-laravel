@extends('layouts.encuesta')

@section('sidebar')
     	@parent
	
@stop

@section('content')

	<h1 class="titulo-header"> {{ $encuesta->nombre }}</h1>

	<div class="form-group form-encuesta">
	       	<form role="form" method="POST"  accept-charset="UTF-8" action= {{ URL::route('encuesta',array('encuesta'=>1, 'email'=>$email)) }}>

			<?php $flag=0; ?>
		       	@foreach($preguntas as $pregunta)
	       			<!--Titulo grupo preguntas -->
	       			@if($pregunta->grupoPreguntas != null  and $flag!=$pregunta->grupoPreguntas)
					<?php 
						$grupoId = $pregunta->grupoPreguntas;
						$grupo = DB::table('titulo_preguntas')->where('id', $grupoId)->first();
						$pregunta2 = $grupo->valor;
						$flag = $pregunta->grupoPreguntas; 
					?>
					<label class="titulo-pregunta item-pregunta text-uppercase" for="role">{{ $pregunta2}}</label>
				@endif	
				<!--Titulo pregunta-->

				<!--campos-->
		       		<div class="campo">
					@if($pregunta->tipo == 'boolean')
						<!-- pregunta -->
						<label class="pregunta item-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
						<!-- pregunta -->
						<div class="check-radio">
							<label for="role">Si</label>
							<input type="radio" required name={{ 'pregunta'.$pregunta->id }} value="si">
						</div>
						<div class="check-radio">
							<label for="role">No</label>
							<input type="radio" required name={{ 'pregunta'.$pregunta->id }} value="no">
						</div>	
					@elseif($pregunta->tipo == 'opciones1-6')
						<!-- pregunta -->
						<label class="sub-pregunta item-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
						<!-- pregunta -->
						<div class="check-radio">
							<label for="role">Exelente</label>
							<input type="radio" required name={{ 'pregunta'.$pregunta->id }} value="exelente">
						</div>
						<div class="check-radio">
							<label for="role">Muy Buena</label>
							<input type="radio" required name={{ 'pregunta'.$pregunta->id }} value="muy buena">
						</div>
						<div class="check-radio">
							<label for="role">Buena</label>
							<input type="radio" required name={{ 'pregunta'.$pregunta->id }} value="buena">
						</div>
						<div class="check-radio">
							<label for="role">Regular</label>
							<input type="radio" required name={{ 'pregunta'.$pregunta->id }} value="regular">
						</div>
						<div class="check-radio">
							<label for="role">Mala</label>
							<input type="radio" required name={{ 'pregunta'.$pregunta->id }} value="mala">
						</div>
						<div class="check-radio">
							<label for="role">Ns/Nc</label>
							<input type="radio" required name={{ 'pregunta'.$pregunta->id }} value="ns/nc">
						</div>	
					@elseif($pregunta->tipo == 'opciones1-3')
						<!-- pregunta -->
						<label class="pregunta item-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
						<!-- pregunta -->
				   		<div class="check-radio">
					   		<label for="role">Si</label>
							<input type="radio" required  name={{ 'pregunta'.$pregunta->id }} value="no">
						</div>
						<div class="check-radio">
							<label for="role">No</label>
							<input type="radio" required name={{ 'pregunta'.$pregunta->id }} value="si">
						</div>
						<div class="check-radio">
							<label for="role">Ns/Nc</label>
							<input type="radio" required  name={{ 'pregunta'.$pregunta->id }} value="ns/nc">
						</div>	
					@elseif($pregunta->tipo == 'text')
						<!-- pregunta -->
						<label  class="pregunta item-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
						<!-- pregunta -->
						<div class="text">
							<textarea  required name={{ 'pregunta'.$pregunta->id }} ></textarea>
						</div>	
					@elseif($pregunta->tipo == 'sub-text')
						<!-- pregunta -->
						<label  class="sub-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
						<!-- pregunta -->
						<div class="sub-text">
							<textarea  name={{ 'pregunta'.$pregunta->id }} ></textarea>
						</div>	
					@endif
				</div>
				<!--campos-->

			@endforeach

			<!--validacion token-->
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<!--validacion token-->

			<button class="boton" type="submit">enviar</button>

		</form>

	</div>



@stop
