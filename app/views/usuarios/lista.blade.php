@extends('layouts.master')

@section('sidebar')
     @parent
     <p>Lista de usuarios</p>
@stop

@section('content')
        <h1>Usuarios</h1>
<ul>
  @foreach($usuarios as $usuario)
        <li>  Username: {{ HTML::link( 'usuarios/'.$usuario->id , $usuario->username ) }}</li>
    @endforeach
</ul>
@stop
