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
				<div class=" block-pregunta">
						<div class="container">
							<div class="row">
								<div class="left pull-left col-md-8">
									<div class="cont-ident col-md-2">
										<div class="ident">
											0{{$ident}}
										</div>
									</div>
						                               	<?php $ident = $ident + 1; ?>
									<!-- pregunta -->
									<div class="block  col-md-8 text-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</div>
									<!-- //pregunta -->
								</div>
								<div class="right pull-right col-md-4">
									@if($tipo == 'si-no')
									<div class="container respuestas col-md-12">
										<div class="si">{{	Respuesta::si($pregunta->id); }}</div>
										<div class="no">{{ 	Respuesta::no($pregunta->id); }}</div>
									</div>
									@elseif($tipo == 'e-mb-b-r-m-ns/nc')
									<div class="container respuesta1">
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
									</div>
									@endif
								</div>
							</div>
						</div>
				</div>


			          @elseif($identificacion == 'null')
			             

		                     @endif
	       		

				<!--campos-->
		       		<div class="campo">
					@if($tipo == 'si-no')
						

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
