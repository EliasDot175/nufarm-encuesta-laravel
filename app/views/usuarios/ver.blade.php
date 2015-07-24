@extends('layouts.master')

@section('sidebar')
     @parent
     <p>  {{ HTML::link('usuarios', 'Volver al Listado de Usuarios'); }}</p>
@stop

@section('content')
    <h1>Usuario ID Nº{{$usuario->id}}</h1>
    <h3>Información de usuario</h4>
    <p>Nombre :  {{ $usuario->nombre  }}</p>
    <p>Usuario creado el : {{ $usuario->created_at}}</p>
@stop