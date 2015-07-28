@extends('layouts.master')

@section('sidebar')
     @parent
     <p>Lista de encuestas</p>
@stop

@section('content')
        <h1>Encuestas</h1>
	<table>
		<thead>
			<tr>
		             	<th> ID Encuesta </th>
		             	<th> ID Usuario</th>
		             	<th> IP Usuario</th>
		             	<th> Email Usuario</th>
		             	<th> Ver </th>
		            </tr>
		</thead>
		<tbody>
  			@foreach($encuestas as $encuesta)
			             <tr>
			             	<td>{{ $encuesta->idEncuesta }}</td>
			                	<?php  
				   		$usuarios = $encuesta->idUsuario;
				  		$usuario = DB::table('users')->where('id', $usuarios)->first();
				        	?>
			             	<td >{{ $usuario ->id}}</td>
			             	<td >{{ $usuario ->ip}}</td>
			             	<td >{{ $usuario ->email }}</td>
			              	<td>{{ HTML::link( 'encuesta-detalle/'.$encuesta->id , 'ver' ) }}</td>
			             </tr>
    			@endforeach
	       	</tbody>
	</table>

@stop
