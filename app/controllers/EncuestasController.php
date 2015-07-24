<?php 
use App\Http\Controllers\Controller;
class EncuestasController extends BaseController {

    /**
     * Mustra la lista con todos los usuarios
     */
    public function formularioEncuesta()
    {
        //listado de preguntas
        $preguntas = Pregunta::all(); 

        //nombre Encuesta
        $encuesta = DB::table('encuesta')->where('id', '1')->first();

        return View::make('encuesta.formulario', array('preguntas' => $preguntas, 'encuesta' => $encuesta));

        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los usuarios
    }


         public function crearEncuesta()
    {
// llamamos a la función de agregar vendedor en el modelo y le pasamos los datos del formulario 
            $respuesta = Input::all();

            echo("<pre>");
                print_r($respuesta);
            echo "</pre>";
            die();
                // $x = new Respuesta();
                // $x->idUsuarioEncuesta = valor
                // $x->idEncuestaPregunta = valor
                // $x->save();
            //Encuesta ID 1
            //$encuesta = DB::table('encuesta')->where('id', '1')->first();

            //Usuario encuesta ID 1
            //$usuario_encuesta = DB::table('usuario_encuesta')->where('id', '1')->first();

            //Insert en la base de datos
            //DB::insert("INSERT INTO respuesta (id, idUsuarioEncuesta, idEncuestaPregunta, valor) VALUES (NULL, 1,1, 'test')" );

            //redirecciona al finalizar
            //return Redirect::to('/');

             return View::make('encuesta.completado', array('encuesta' => $encuesta, 'respuesta' => $respuesta));

    }

}
