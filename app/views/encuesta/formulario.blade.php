@extends('layouts.encuesta')

@section('sidebar')
     	@parent
	
@stop

@section('content')

	<!-- <h1 class="titulo-header"> {#{ $encuesta->nombre }#}</h1> -->

	<!-- Preguntas -->
        	<div class="item-preguntas">
                	<div class="contenido">
                     	<div  class="numero lnk-pag" to="1">
                                          <p>01</p>
                               </div>
                               <div class="numero lnk-pag" to="2">
                                          <p>02</p>    
                               </div>
                               <div  class="numero lnk-pag" to="3">
                                         <p>03</p>        
                               </div>
                               <div  class="numero lnk-pag" to="4">
                                          <p>04</p>        
                               </div>
                               <div  class="numero lnk-pag" to="5">
                                         <p>05</p>         
                               </div>
                               <div class="numero lnk-pag" to="6">
                                         <p>06</p>        
                               </div>
                               <div class="numero lnk-pag" to="7">
                                          <p>07</p>      
                               </div>
                               <div class="numero lnk-pag">
                                         <p>08</p>         
                               </div>
                	</div>
        	</div>
        	<!-- //Preguntas -->


	<!-- Formulario -->
	<div class="form-group form-encuesta">
	       	

	       	<form role="form" method="POST"  accept-charset="UTF-8" action= {{ URL::route('encuesta',array('encuesta'=>1, 'email'=>$email, 'empresa'=>$empresa, 'nombre'=>$nombre)) }}>
			
			<?php 
				//contadores
				$ident=1; 
				$letra = "A";
				$i = "A";
				$c = 1;
				$val = 1;
			?>

		       	@foreach($preguntas as $pregunta)
			<!--*************************BLOCK PREGUNTA ****************************-->
			@if($c == 1 || $c == 2 || $c == 3 || $c == 20 || $c == 21 || $c == 23 || $c == 25 || $c == 27)
				<div id="pagina-<?php echo $val; ?>">
				<?php  $val = $val + 1; ?>
			@endif

		       	
		       	

				<!--************************ PREGUINTA****************************** -->
				
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
			             <div class="block-pregunta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
				             <div class="preguntas col-xs-12 col-sm-12 col-md-12 ol-lg-12">
						<div class="contenido">
				                               	<!-- pregunta -->
							<label class="text-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
							<!-- //pregunta -->
						</div>
					</div>
				</div>

		                          @endif
				
				
				<!-- *************************PREGUNTA************************ -->


				<!--*************************CAMPOS ****************************-->
		       		

				@if($tipo == 'si-no')
				<div class="block-pregunta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					<div class="campo col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		       				<div class="contenido">
							<!-- items -->
							<div class="block">
								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-3.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'si')) }}
									<input class="item" type="radio" required name={{ 'pregunta'.$pregunta->id }} value="si">
									<label class="item" for="role">
										<p class="text-uppercase">Si</p>
									</label>
								</div>

								<div class="barra">
									{{ HTML::image('assets/imagenes/barra.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'barra')) }}
								</div>

								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-5.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'no')) }}
									<input class="item"  type="radio" required name={{ 'pregunta'.$pregunta->id }} value="no">
									<label class="item" for="role">
										<p class="text-uppercase">No </p>
									</label>
								</div>	
							</div>
							<!-- //items -->
						</div>	
					</div>
				</div>

				@elseif($tipo == 'e-mb-b-r-m-ns/nc')
				<div class="block-pregunta block-pregunta-acordeon col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					
					<div id="accordion" class=" ">

						<div class="panel-acordeon ">
							<div class="contenido">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $letra; ?>">
									@if($identificacion == 'letra')
										<div id="letra-<?php echo $letra; ?>" class="letra">
							                                       	<p class="text-uppercase"><?php echo $letra; ?> </p>     
							                               	</div>
							                               	<!-- pregunta -->
										<label class="text-pregunta text-uppercase"  for="role">{{ $pregunta->valor}}</label>
										<!-- //pregunta -->

										@if($letra == 'i')
											<?php
												$letra = "A";
											?>
								                          @endif
								             @endif
						            		</a>
					            		</div>
					       	</div>

						<div id="pagina-3" class="contenido-acordeon">
						       	<div class="contenido">		
						        		<div id="collapse<?php echo $letra; ?>" class="panel-collapse collapse">
						        		
							            		<div class="panel-body">
						                			<!-- items -->
										<div class="block">
											<div class="check-radio-icon">
												{{ HTML::image('assets/imagenes/cara-1.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'excelente')) }}
												<input class="item" type="radio" required name={{ 'pregunta'.$pregunta->id }} value="exelente">
												<label class="item"for="role">
													<p class="text-uppercase">Exelente</p>
												</label>
											</div>
											<div class="check-radio-icon">
												{{ HTML::image('assets/imagenes/cara-2.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'Muy Buena')) }}
												<input class="item"type="radio" required name={{ 'pregunta'.$pregunta->id }} value="muy buena">
												<label class="item" for="role">
													<p class="text-uppercase">Muy Buena</p>
												</label>
											</div>
											<div class="check-radio-icon">
												{{ HTML::image('assets/imagenes/cara-3.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'Buena')) }}
												<input class="item" type="radio" required name={{ 'pregunta'.$pregunta->id }} value="buena">
												<label class="item" for="role">
													<p class="text-uppercase">Buena</p>
												</label>
											</div>
											<div class="check-radio-icon">
												{{ HTML::image('assets/imagenes/cara-4.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'Regular')) }}
												<input class="item" type="radio" required name={{ 'pregunta'.$pregunta->id }} value="regular">
												<label class="item" for="role">	
													<p class="text-uppercase">Regular</p>
												</label>
											</div>
											<div class="check-radio-icon">
												{{ HTML::image('assets/imagenes/cara-5.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'mala')) }}
												<input class="item" type="radio" required name={{ 'pregunta'.$pregunta->id }} value="mala">
												<label class="item" for="role">
													<p class="text-uppercase">Mala</p>
												</label>
											</div>
											<div class="check-radio-icon">
												{{ HTML::image('assets/imagenes/cara-6.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'ns/nc')) }}
												<input class="item" type="radio" required name={{ 'pregunta'.$pregunta->id }} value="ns/nc">
												<label class="item" for="role">
													<p class="text-uppercase">ns/nc</p>
												</label>
											</div>
										</div>
										<!-- //items -->
									
							        		</div>
							        		<div class="comentario" id='comentario-<?php echo $letra;?>'>

							        		</div>
							        		
							        	</div>
						    	</div>
					    	</div>
					</div>
					<?php $letra++; ?>
				</div>

				@elseif($identificacion == 'comentario')
					<script type="text/javascript" >
						$( document ).ready(function() {
	   						$( "#comentario-{{ $i }}" ).append( '<label class="text-pregunta text-uppercase"  for="role">{{ HTML::image("assets/imagenes/comentario.png", "Imagen no encontrada") }}<p>{{ $pregunta->valor}}</p></label><div class="img"></div><textarea  required name={{ "pregunta".$pregunta->id }} ></textarea>');
						});
					</script>

					@if($letra == 'i')
						<?php
							$i= "A";
						?>
					@endif

					<?php $i++; ?>
							

				@elseif($tipo == 'si-no-ns/nc')
				<div class="block-pregunta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					<div class="campo col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		       				<div class="contenido">
							<!-- items -->
							<div class="block">
								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-3.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'si')) }}
									<input class="item" type="radio" required name={{ 'pregunta'.$pregunta->id }} value="si">
									<label class="item" for="role">
										<p class="text-uppercase">Si</p>
									</label>
								</div>
								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-5.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'no')) }}
									<input class="item"  type="radio" required name={{ 'pregunta'.$pregunta->id }} value="no">
									<label class="item" for="role">
										<p class="text-uppercase">No </p>
									</label>
								</div>
								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-6.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'no')) }}
									<input class="item"  type="radio" required name={{ 'pregunta'.$pregunta->id }} value="No sabe / No contesta">
									<label class="item" for="role">
										<p class="text-uppercase">No sabe / No contesta </p>
									</label>
								</div>	
							</div>
							<!-- //items -->
						</div>	
					</div>
				</div>

				@elseif($tipo == 'Tsi-Tno-Tns/nc')
				<div class="block-pregunta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					<div class="campo col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		       				<div class="contenido">

							<!-- //items -->
							<div class="block">
								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-3.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'si')) }}
									<input class="item" type="radio" required name={{ 'pregunta'.$pregunta->id }} value="Tengo Interes">
									<label class="item" for="role">
										<p class="text-uppercase">Tengo Interes</p>
									</label>
								</div>
								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-5.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'no')) }}
									<input class="item"  type="radio" required name={{ 'pregunta'.$pregunta->id }} value="No tengo Interes">
									<label class="item" for="role">
										<p class="text-uppercase">No tengo Interes</p>
									</label>
								</div>
								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-6.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'no')) }}
									<input class="item"  type="radio" required name={{ 'pregunta'.$pregunta->id }} value="ns/nc">
									<label class="item" for="role">
										<p class="text-uppercase">No sabe / No contesta </p>
									</label>
								</div>	
							</div>
							<!-- //items -->
						</div>	
					</div>
				</div>

				@elseif($tipo == 'mucho-poco-nada')
				<div class="block-pregunta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					<div class="campo col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		       				<div class="contenido">

							<!-- //items -->
							<div class="block">
								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-2.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'si')) }}
									<input class="item" type="radio" required name={{ 'pregunta'.$pregunta->id }} value="mucho">
									<label class="item" for="role">
										<p class="text-uppercase">Mucho</p>
									</label>
								</div>
								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-4.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'no')) }}
									<input class="item"  type="radio" required name={{ 'pregunta'.$pregunta->id }} value="Poco">
									<label class="item" for="role">
										<p class="text-uppercase">Poco</p>
									</label>
								</div>
								<div class="check-radio-icon">
									{{ HTML::image('assets/imagenes/cara-5.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'no')) }}
									<input class="item"  type="radio" required name={{ 'pregunta'.$pregunta->id }} value="Nada">
									<label class="item" for="role">
										<p class="text-uppercase">Nada</p>
									</label>
								</div>	
							</div>
							<!-- //items -->
						</div>
					</div>
				</div>
							
				@elseif($tipo == 'text')
				<div class="block-pregunta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					<div class="campo col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		       				<div class="contenido">
							<!-- items -->
							<div class="block">
								<div class="text">
									<textarea  required name={{ 'pregunta'.$pregunta->id }} ></textarea>
								</div>	
							</div>
							<!-- //items -->
						</div>
					</div>

					@elseif($tipo == 'sub-text')
					<div class="campo col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		       				<div class="contenido">

							<!-- items -->
							<div class="block">
								<div class="text">
									<textarea  required name={{ 'pregunta'.$pregunta->id }} ></textarea>
								</div>	
							</div>
							<!-- //items -->
						</div>
					</div>

				</div>
				@elseif($tipo == 'null')

				@endif

				<!--*************************//CAMPOS ****************************-->


			@if($c == 1 || $c == 2 || $c == 3 || $c == 20 || $c == 21 || $c == 23 || $c == 25 || $c == 27)
				</div>
			@endif
			<?php $c = $c +1?>
			<!--*************************//BLOCK PREGUNTA ****************************-->

			@endforeach

			<!--validacion token-->
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<!--validacion token-->

			<button class="boton" type="submit">enviar</button>
		</form>

	</div>
	<!-- Formulario -->


@stop
