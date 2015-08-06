@extends('layouts.encuesta')

@section('sidebar')
     	@parent
	
@stop

@section('content')


	<!-- Preguntas -->
        	<div class="item-preguntas off">
                	<div class="contenido">
                     	<div  id="numero-1" class="numero lnk-pag" to="1">
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
		
		
	<div class="mensaje">
		<h1 class="error"> {{ $encuesta->nombre }}</h1>
		<h2>Muchas gracias por participar de la encuesta.</h2>
		<p class="text-uppercase">{{ $mensaje }}</p>
	</div>
			

@stop