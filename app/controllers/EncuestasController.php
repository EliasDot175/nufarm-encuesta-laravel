<?php 

class EncuestasController extends BaseController {

    /* * * 
     * * * CREAR FORMULARIO BLOQUEANDO POR IP SIN TOKEN * * *
     * * */
    public function formularioEncuesta()
    {
        //Datos encuesta y lista preguntas
        $encuesta = 1;
        $preguntas= DB::table('pregunta')->where('idEncuesta', $encuesta)->get();
        $datosEncuesta = DB::table('encuesta')->where('id', $encuesta)->first();

        //Busca usuario por ip
        $ip=Request::getClientIp();
        $usuarioIP= DB::table('users')->where('ip', $ip)->first();
        if ($usuarioIP) {
            $mensaje =  'Usted ya ha completado la encuesta, sólo puede realizar esta acción una vez';
            return View::make('encuesta.error', array('mensaje' => $mensaje, 'usuario' => $usuarioIP, 'encuesta' => $datosEncuesta));
        }

        return View::make('encuesta.formulario', array('preguntas' => $preguntas, 'encuesta' => $datosEncuesta));
    }


    /* * * 
     * * * CREAR FORMULARIO  TOKEN * * *
     * * */
    public function formularioTokenEncuesta($email)
    {
        //Datos encuesta y lista preguntas
        $encuesta = 1;
        $preguntas = DB::table('pregunta')->where('idEncuesta', $encuesta)->get();
        $datosEncuesta = DB::table('encuesta')->where('id', $encuesta)->first();

        //Busca usuario por email
        $usuariosEmail = DB::table('users')->where('email', $email)->first();
        if ($usuariosEmail && $usuariosEmail != 'anónimo' ) {
            $mensaje =  'Usted ya ha completado la encuesta, sólo puede realizar esta acción una vez';
            return View::make('encuesta.error', array('mensaje' => $mensaje, 'usuario' => $usuariosEmail , 'encuesta' => $datosEncuesta));
        }

        //return Redirect::to('encuesta/crear/{encuesta}/{email}');

        //return Redirect::route('encuesta', array('email' => $email, 'encuesta' => 1));

        return View::make('encuesta.formulario', array('preguntas' => $preguntas, 'email' => $email, 'encuesta' => $datosEncuesta));
    }


    /* * * 
     * * * CREAR ENCUESTA * * *
     * * */
         public function crearEncuesta($encuesta, $email)
    {
            if(Session::token() != Input::get('_token')) {
                die();
            }

             $respuesta = Input::all(); //array respuestas form //print_r($respuesta);
             $datosEncuesta = DB::table('encuesta')->where('id', $encuesta)->first();
             $cantidad= DB::table('pregunta')->where('idEncuesta', $encuesta)->count();

            //Inserta usuario por email e ip
            $ip=Request::getClientIp();
            $usuarioIP= DB::table('users')->where('ip', $ip)->first();
            $usuario =  $usuarioIP->id;

            $usuariosEmail = DB::table('users')->where('email', $email)->first();
            if (empty($usuariosEmail )) {
                    $x = new User();
                    $x->email =  $email;
                    $x->nombre =  'anónimo';
                    $x->ip =  $ip;
                    $x->save();
            }else{
                $mensaje =  'Usted ya ha completado la encuesta, sólo puede realizar esta acción una vez';
                return View::make('encuesta.error', array('mensaje' => $mensaje, 'encuesta' => $datosEncuesta));
            }

            //Inserta usuario_encuesta
            $x = new UsuarioEncuesta();
            $x->idUsuario = $usuario;
            $x->idEncuesta = $encuesta;
            $x->save();
            $usuarioEnc = DB::table('usuario_encuesta')->where('idUsuario', $usuario)->first();
            $usuarioEncuesta =  $usuarioEnc->id;

            //Inserta respuestas
            for ($i=1; $i <= $cantidad; $i++) { 
                    $valor = Input::get('pregunta'.$i);
                    $x = new Respuesta();
                    $x->idUsuarioEncuesta = $usuarioEncuesta;
                    $x->idEncuestaPregunta = $i;
                    $x->valor = $valor ;
                    $x->save();
             }
        
             return View::make('encuesta.completado', array('encuesta' => $datosEncuesta));
    }
}
