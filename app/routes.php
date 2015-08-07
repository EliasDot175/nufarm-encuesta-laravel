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
	Route::get('/', array('as' => 'index', 'uses' => 'AdminController@metricasEncuestas'));
	Route::get('admin', array('as' => 'admin', 'uses' => 'AdminController@mostrarEncuestas'));
	Route::get('lista-encuestas', array('as' => 'lista-encuesta', 'uses' => 'AdminController@mostrarEncuestas'));
	Route::get('encuesta-detalle/{id}', array('as' => 'detalle-encuesta', 'uses'=>'AdminController@verEncuestas'));
	Route::get('metricas-encuestas', array('as' => 'metricas-encuesta', 'uses'=>'AdminController@metricasEncuestas'));
});

/*Rutas generales*/

//PDF
/*Route::get('generar', function()
{
    $html = '<html><body>';
    $html.= '<p style="color:red">Generando un sencillo pdf ';
    $html.= 'de forma realmente sencilla.</p>';
    $html.= '</body></html>';
    return PDF::load($html, 'A4', 'portrait')->show();
});

Route::get('vista', function()
{
    $html = View::make("encuesta.pdf");
    return PDF::load($html, 'A4', 'portrait')->show();
});
*/

Route::get('descargar/{codigo}',array('as' => 'descargar',function($codigo)
{
	$token = Session::get("_token");
    	$html = '<html><body>';
    	$html.= '<p style="color:red">Generando un sencillo pdf ';
    	$html.= 'de forma realmente sencilla.</p>'.$codigo;
    	$html.= '</body></html>';
    	return PDF::load($html, 'A4', 'portrait')->download('nombreArchivoPdf');
}));


Route::get('/formulario', function(){
    	$token = Session::get("_token");
	$preguntas = Session::get("preguntas");
	$email = Session::get("email");
	$nombre = Session::get("nombre");
	$empresa = Session::get("empresa");
	$datosEncuesta = Session::get("datosEncuesta");

	return View::make('encuesta.formulario', array('preguntas' => $preguntas, 'email' => $email, 'nombre' => $nombre, 'empresa' => $empresa, 'encuesta' => $datosEncuesta));

});

Route::get('{email}/{nombre?}/{empresa?}', array('uses' => 'EncuestasController@formularioTokenEncuesta'));
Route::post('encuesta/usuario-identificado', array('as' => 'usuario-identificado', 'uses' => 'EncuestasController@formEncuesta'));
Route::post('crear/{encuesta}/{email}/{nombre?}/{empresa?}', array('as' => 'encuesta','uses' => 'EncuestasController@crearEncuesta'));



