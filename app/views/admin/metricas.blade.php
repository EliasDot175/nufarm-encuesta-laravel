@extends('layouts.master')

@section('sidebar')
     @parent
     <script  type="text/javascript" >
     	$(document).ready(function(){
		//mostrar categoria
		$("#metricas").css({
			color: '#fff',
    			background: '#0e7e02'
		});
	});
     </script>
@stop

@section('content')
	<div class="panel panel-success">
        		<h1 class="text-uppercase">Cantidad de Encuestas realizadas: <span>{{ $users = DB::table('usuario_encuesta')->count(); }}</span></h1>
        	</div>


	<div class="metricas">
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
	
						<table class="table table-striped">
							<thead>
								<tr>
							             	<th> si</th>
							             	<th> no</th>
							            </tr>
							</thead>
							<tbody>
								<tr>
								          <td>{{ $users = DB::table('respuesta')->where('valor', 'si')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
									<td>{{ $users = DB::table('respuesta')->where('valor', 'no')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
								</tr>
						       	</tbody>
						</table>

					@elseif($pregunta->tipo == 'opciones1-6')
						<!-- pregunta -->
						<label class="sub-pregunta item-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
						<!-- pregunta -->
				

						<table class="table table-striped">
							<thead>
								<tr>
							             	<th> Exelente</th>
							             	<th>Muy Buena</th>
							             	<th> Buena</th>
							             	<th> Regular</th>
							             	<th> Mala</th>
							             	<th> Ns/Nc</th>
							            </tr>
							</thead>
							<tbody>
								<tr>
								          <td>{{ $users = DB::table('respuesta')->where('valor', 'exelente')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
									<td>{{ $users = DB::table('respuesta')->where('valor', 'muy buena')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
									<td>{{ $users = DB::table('respuesta')->where('valor', 'buena')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
									<td>{{ $users = DB::table('respuesta')->where('valor', 'regular')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
									<td>{{ $users = DB::table('respuesta')->where('valor', 'mala')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
									<td>{{ $users = DB::table('respuesta')->where('valor', 'ns/nc')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
								</tr>
						       	</tbody>
						</table>


					@elseif($pregunta->tipo == 'opciones1-3')
						<!-- pregunta -->
						<label class="pregunta item-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
						<!-- pregunta -->
						<table class="table table-striped">
							<thead>
								<tr>
							             	<th> si</th>
							             	<th> no</th>
							             	<th> ns/nc</th>
							            </tr>
							</thead>
							<tbody>
								<tr>
								          <td>{{ $users = DB::table('respuesta')->where('valor', 'si')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
									<td>{{ $users = DB::table('respuesta')->where('valor', 'no')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
									<td>{{ $users = DB::table('respuesta')->where('valor', 'ns/nc')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
								</tr>
						       	</tbody>
						</table>

					@elseif($pregunta->tipo == 'text')
						<!-- pregunta -->
						<label  class="pregunta item-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
						<!-- pregunta -->
						{{ $users = DB::table('respuesta')->where('idEncuestaPregunta', $pregunta->id)->count(); }}
					@elseif($pregunta->tipo == 'sub-text')
						<!-- pregunta -->
						<label  class="sub-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
						<!-- pregunta -->
						{{ $users = DB::table('respuesta')->where('idEncuestaPregunta', $pregunta->id)->count(); }}
					@endif
				</div>
				<!--campos-->

			@endforeach

	</div>

@stop
