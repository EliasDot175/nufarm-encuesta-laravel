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
	//Route::get('/', 'HomeController@showWelcome');
	Route::get('admin', array('uses' => 'UsuariosController@mostrarUsuarios'));

	Route::get('usuarios', array('uses' => 'UsuariosController@mostrarUsuarios'));

	Route::get('usuarios/nuevo', array('uses' => 'UsuariosController@nuevoUsuario'));

	

	Route::get('usuarios/{id}', array('uses'=>'UsuariosController@verUsuario'));
	// esta ruta contiene un parámetro llamado {id}, que sirve para indicar el id del usuario que deseamos buscar
	// este parámetro es pasado al controlador, podemos colocar todos los parámetros que necesitemos
	// solo hay que tomar en cuenta que los parámetros van entre llaves {}
	// si el parámetro es opcional se colocar un signo de interrogación {parámetro?
}

});

Route::get('/', array('uses' => 'EncuestasController@formularioEncuesta'));
Route::post('encuesta/crear', array('uses' => 'EncuestasController@crearEncuesta'));



