@extends('layouts.encuesta')

@section('sidebar')
     	@parent
	
@stop

@section('content')


	<!-- Preguntas -->
        	<div class="item-preguntas off">
                	<div class="contenido">
                     	<div  class="numero " to="1">
                                          <p>01</p>
                               </div>
                               <div class="numero " to="2">
                                          <p>02</p>    
                               </div>
                               <div   class="numero " to="3">
                                         <p>03</p>        
                               </div>
                               <div   class="numero " to="4">
                                          <p>04</p>        
                               </div>
                               <div  class="numero " to="5">
                                         <p>05</p>         
                               </div>
                               <div  class="numero " to="6">
                                         <p>06</p>        
                               </div>
                               <div  class="numero " to="7">
                                          <p>07</p>      
                               </div>
                               <div  class="numero " to="8">
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