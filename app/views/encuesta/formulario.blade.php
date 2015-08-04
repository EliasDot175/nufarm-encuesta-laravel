@extends('layouts.encuesta')

@section('sidebar')
     	@parent
	
@stop

@section('content')

	<!-- <h1 class="titulo-header"> {#{ $encuesta->nombre }#}</h1> -->

	<!-- Preguntas -->
        	<div class="item-preguntas">
                	<div class="contenido">
                     	<div  id="numero-1" class="activo numero lnk-pag" to="1">
                                          <p>01</p>
                               </div>
                               <div id="numero-2" class="numero lnk-pag" to="2">
                                          <p>02</p>    
                               </div>
                               <div  id="numero-3" class="numero lnk-pag" to="3">
                                         <p>03</p>        
                               </div>
                               <div  id="numero-4" class="numero lnk-pag" to="4">
                                          <p>04</p>        
                               </div>
                               <div  id="numero-5" class="numero lnk-pag" to="5">
                                         <p>05</p>         
                               </div>
                               <div id="numero-6" class="numero lnk-pag" to="6">
                                         <p>06</p>        
                               </div>
                               <div id="numero-7" class="numero lnk-pag" to="7">
                                          <p>07</p>      
                               </div>
                               <div id="numero-8" class="numero lnk-pag" to="8">
                                         <p>08</p>         
                               </div>
                	</div>
        	</div>
        	<!-- //Preguntas -->


	<!-- Formulario -->
	<div class="form-group form-encuesta">


	       	<form id="encuesta" role="form" method="POST"  accept-charset="UTF-8" action= {{ URL::route('encuesta',array('encuesta'=>1, 'email'=>$email, 'empresa'=>$empresa, 'nombre'=>$nombre)) }}>
			
			<?php 
				//contadores
				$ident=1; 
				$letra = "A";
				$i = "A";
				$c = 1;
				$val = 1;
				$flag = 0;
			?>

		       	@foreach($preguntas as $pregunta)
			<!--*************************BLOCK PREGUNTA ****************************-->

				<!-- contador bloques preguntas -->
				@if($c == 1 || $c == 2 || $c == 20 || $c == 21 || $c == 23 || $c == 25 || $c == 27) 
					<div class="item-pagina" id="pagina-<?php echo $val; ?>" class="col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					<?php  $val = $val + 1; ?>
				@elseif($c == 3)
					<div class="item-pagina" id="pagina-<?php echo $val; ?>" class="col-xs-12 col-sm-12 col-md-12 ol-lg-12">
						<div id="accordion">
						<?php  $val = $val + 1; ?>
				@endif
				<!-- //contador bloques preguntas -->
		       	
		       	
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
							<label class="block text-pregunta"  for="role">{{ $pregunta->valor}}</label>
							<!-- //pregunta -->
						</div>
					</div>
				</div>
				
			             @elseif($identificacion == 'null')
			             



		                          @endif
				
				
				<!-- *************************PREGUNTA************************ -->


				<!--*************************CAMPOS ****************************-->
		       		

				@if($tipo == 'si-no')
				<div class="block-respuesta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
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
									<label  class="item" for="role">
										<p class="text-uppercase">No </p>
									</label>
								</div>	
							</div>
							<!-- //items -->
						</div>	
					</div>
				</div>



				<!-- Sub items acordeon -->
				@elseif($tipo == 'e-mb-b-r-m-ns/nc')
				<div class="block-respuesta block-pregunta-acordeon col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					
					<div  class=" ">

						<div class="panel-acordeon">
							<a id="acordeon-coll" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $letra; ?>">
								<div class="contenido">
								
									@if($identificacion == 'letra')
										<div id="letra-<?php echo $letra; ?>" class="letra">
							                                       	<p class="text-uppercase"><?php echo $letra; ?> </p>     
							                               	</div>
							                               	<!-- pregunta -->
										<label class="text-pregunta"  for="role">{{ $pregunta->valor}}</label>
										<!-- //pregunta -->

										@if($letra == 'i')
											<?php
												$letra = "A";
											?>
								                          @endif
								             @endif
						            		</div>
					            		</a>
					       	</div>

						<div class="contenido-acordeon">
						       	<div class="contenido">		
						        		<div id="collapse<?php echo $letra; ?>" class="panel-collapse collapse <?php if($flag == 0){ $flag = 1; echo 'in';} ?> ">
						        		
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
										<!-- COMENTARIOS ACORDEON - Jquery  -->
							        		</div>
							        		
							        	</div>
						    	</div>
					    	</div>
					</div>
					<?php $letra++; ?>
				</div>




				<!-- COMENTARIOS ACORDEON - Jquery -->
				@elseif($tipo == 'comentario-acordeon')
					<script type="text/javascript" >
						$( document ).ready(function() {
	   						$( "#comentario-{{ $i }}" ).append( '<label class="text-pregunta"  for="role">{{ HTML::image("assets/imagenes/comentario.png", "Imagen no encontrada") }}<p>{{ $pregunta->valor}}</p></label><div class="img"></div><textarea name={{ "pregunta".$pregunta->id }} value="null"  ></textarea>');
						});
					</script>

					@if($letra == 'i')
						<?php $i= "A"; ?>
					@endif

					<?php $i++; ?>
							


				<!-- SI - NO - NO SABE NO CONTESTA -->
				@elseif($tipo == 'si-no-ns/nc')
				<div class="block-respuesta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
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





				<!-- TENGO INTERES - NO TENGO INTERES - NO SABE NO CONTESTA -->
				@elseif($tipo == 'Tsi-Tno-Tns/nc')
				<div class="block-respuesta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
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


				

				<!-- MUCHO - POCO - NADA -->
				@elseif($tipo == 'mucho-poco-nada')
				<div class="block-respuesta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
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




				<!-- TEXTO -->		
				@elseif($tipo == 'text')
				<div class="block-respuesta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					<div class="block-pregunta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					             <div class="sub-preguntas col-xs-12 col-sm-12 col-md-12 ol-lg-12">
							<div class="contenido">
					                               	<div class="comentario-c" id="comentario-G">
									<div class="img"></div>
									<textarea required name={{ 'pregunta'.$pregunta->id }}></textarea>
								</div>
							</div>
						</div>
					</div>




				<!-- SUB - TEXTO -->
				@elseif($tipo == 'sub-text')
					
					<div class="block-respuesta col-xs-12 col-sm-12 col-md-12 ol-lg-12">
					             <div class="sub-preguntas col-xs-12 col-sm-12 col-md-12 ol-lg-12">
							<div class="contenido">
					                               	<div class="comentario-b" id="comentario-G">
									<label class="text-pregunta" for="role">
										{{ HTML::image('assets/imagenes/comentario.png', "Imagen no encontrada", array( 'class' => 'item-img', 'title' => 'no')) }}
										<p>{{ $pregunta->valor}}</p>
									</label>
									<!-- <div class="img"></div>-->
									<textarea value="null" name={{ 'pregunta'.$pregunta->id }}></textarea>
								</div>
							</div>
						</div>
					</div>


				@endif

				<!--*************************//CAMPOS ****************************-->

				<!-- contador bloques preguntas -->
				@if($c == 1 || $c == 2 || $c == 20 || $c == 22 || $c == 24 || $c == 26 || $c == 27)
					</div>
				@elseif($c == 19)
						</div>
					</div>
				@endif
				<?php $c = $c +1?>
				<!-- //contador bloques preguntas -->
			
			<!--*************************//BLOCK PREGUNTA ****************************-->

			@endforeach

			<!--validacion token-->
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<!--validacion token-->

			<div class="footer-form contenido">
				<button id="finalizar" class="boton boton-rigth" type="submit">Finalizar</button>
			</div>
			
		</form>


	</div>
	<!-- Formulario -->

	<div class="footer-form contenido">
		<p id="anterior" class="boton boton-left" to="0">anterior</p>
		<p id="siguiente" class="boton boton-rigth" to="2">siguiente</p>
	</div>

@stop
