<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Llamadas al controlador Auth*/
Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@logOut');

/*Rutas privadas solo para usuarios autenticados*/
Route::group(['before' => 'auth'], function()
{
	Route::get('/', array('uses' => 'AdminController@mostrarEncuestas'));
	Route::get('admin', array('uses' => 'AdminController@mostrarEncuestas'));
	Route::get('lista-encuestas', array('uses' => 'AdminController@mostrarEncuestas'));
	Route::get('encuesta-detalle/{id}', array('uses'=>'AdminController@verEncuesta'));
	// parámetros entre llaves {}, si el parámetro es opcional {parámetro?}

});

/*Rutas generales*/
Route::get('encuesta/{email}', array('uses' => 'EncuestasController@formularioTokenEncuesta'));
Route::post('encuesta/crear/{encuesta}/{email}', array('as' => 'encuesta','uses' => 'EncuestasController@crearEncuesta'));



