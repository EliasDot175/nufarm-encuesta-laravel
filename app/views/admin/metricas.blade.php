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
	<div class="metricas">

		<div class="panel panel-success">
	        		<h1 class="text-uppercase">Cantidad de Encuestas realizadas: <span>{{ $users = DB::table('usuario_encuesta')->count(); }}</span></h1>
	        	</div>

			<?php 
				//contadores
				$ident=1; 
				$letra = "A";
				$i = "A";
				$c = 1;
				$val = 1;
			?>
			
		       	@foreach($preguntas as $pregunta)
		       	<?php $valueTipo = $pregunta->tipo;
				$tipoValue = DB::table('tipo_dato')->where('id', $valueTipo)->first();
				$tipo = $tipoValue->valor; 
			?>

				<?php
					//tipo de respuesta ( exelente-muy bueno-bueno -regunal-malo  /  si-no)
					$valueTipo = $pregunta->tipo;
					$tipoValue = DB::table('tipo_dato')->where('id', $valueTipo)->first();
					$tipo = $tipoValue->valor;
					//identificacion (número o letra)
					$valueIdentificacion = $pregunta->identificacion;
					$tipoIdentificacion = DB::table('identificacion_preguntas')->where('id', $valueIdentificacion)->first();
					$identificacion = $tipoIdentificacion->valor;
				?>

				@if($identificacion == 'numero')
				<div class="block-pregunta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					<div class="preguntas col-xs-12 col-sm-12 col-md-12 ol-lg-12">
						<div class="contenido">
							<div id="pregunta<?php echo $ident; ?>" class="block num-violeta">
				                                       	<p>0 <?php echo $ident; ?> </p>         
				                               	</div>
				                               	<?php $ident = $ident + 1; ?>
							<!-- pregunta -->
							<label class="block text-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
							<!-- //pregunta -->
						</div>
					</div>
				</div>


			          @elseif($identificacion == 'null')
			             

		                     @endif
	       		

				<!--campos-->
		       		<div class="campo">
					@if($tipo == 'si-no')

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

						<hr>

					@elseif($tipo == 'e-mb-b-r-m-ns/nc')
						<h5>{{ $pregunta->valor}}</h5>
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


					@elseif($tipo == 'si-no-ns/nc')

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

					@elseif($tipo == 'Tsi-Tno-Tns/nc')

						<table class="table table-striped">
							<thead>
								<tr>
							             	<th> Tengo Interes</th>
							             	<th> No Tengo Interes</th>
							             	<th> ns/nc</th>
							            </tr>
							</thead>
							<tbody>
								<tr>
								          <td>{{ $users = DB::table('respuesta')->where('valor', 'Tengo Interes')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
									<td>{{ $users = DB::table('respuesta')->where('valor', 'No tengo Interes')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
									<td>{{ $users = DB::table('respuesta')->where('valor', 'ns/nc')->where('idEncuestaPregunta', $pregunta->id)->count(); }}</td>
								</tr>
						       	</tbody>
						</table>

					@elseif($tipo == 'mucho-poco-nada')

						<table class="table table-striped">
							<thead>
								<tr>
							             	<th> Mucho</th>
							             	<th> Poco</th>
							             	<th> Nada</th>
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

					@elseif($tipo == 'sub-text')
						<h5>{{ $pregunta->valor}}</h5>

						<?php 
							$respuestas = DB::table('respuesta')->where('idEncuestaPregunta', $pregunta->id)->get(); 
							$resp = DB::table('respuesta')->where('idEncuestaPregunta', $pregunta->id)->count();
						?>
						
						@if( $resp != 0 )
							<p>Cantidad de  Respuestas: {{ $resp }}</p>
							@foreach($respuestas as $respuesta)
						     		<ul class="list-group">
							        		<li class="list-group-item">  {{ $respuesta->valor }}</li>
							        	</ul>
							@endforeach
						@else
							<p>No hay comentarios</p>

						@endif

					@elseif($tipo == 'text')

						<?php 
							$respuestas = DB::table('respuesta')->where('idEncuestaPregunta', $pregunta->id)->get(); 
							$resp = DB::table('respuesta')->where('idEncuestaPregunta', $pregunta->id)->count();
						?>
						
						@if( $resp != 0 )
							<p>Cantidad de  Respuestas: {{ $resp }}</p>
							@foreach($respuestas as $respuesta)
						     		<ul class="list-group">
							        		<li class="list-group-item">  {{ $respuesta->valor }}</li>
							        	</ul>
							@endforeach
						@else
							<p>No hay comentarios</p>

						@endif
					

					@elseif($tipo == 'comentario-acordeon')
						<h6>{{ $pregunta->valor}}</h6>

						<?php 
							$respuestas = DB::table('respuesta')->where('idEncuestaPregunta', $pregunta->id)->get(); 
							$resp = DB::table('respuesta')->where('idEncuestaPregunta', $pregunta->id)->count();
						?>
						
						@if( $resp != 0 )
							<p>Cantidad de  Respuestas: {{ $resp }}</p>
							@foreach($respuestas as $respuesta)
						     		<ul class="list-group">
							        		<li class="list-group-item">  {{ $respuesta->valor }}</li>
							        	</ul>
							@endforeach
						@else
							<p>No hay comentarios</p>

						@endif
				
					@endif
				</div>
				<!--campos-->

			@endforeach

	</div>

@stop
