<?php 
class AdminController extends BaseController {

     /* * *
     * * * METRICAS ENCUESTAS * * *
     * * */
    public function metricasEncuestas()
    {
        $encuesta = UsuarioEncuesta::all(); 
        //Datos encuesta y lista preguntas
        // $encuesta = 1;
        $preguntas = Pregunta::where('idEncuesta', 1)
                        ->join('tipo_dato','pregunta.tipo','=','tipo_dato.id')
                        ->join('identificacion_preguntas as id_preg','pregunta.identificacion','=','id_preg.id')
                        ->select('pregunta.id','pregunta.valor as valpregunta', 'pregunta.posicion as posicion','id_preg.valor as id_preg_valor','tipo_dato.valor as tipo_dato_valor')
                        ->get()
                        ->toArray();

        $respuestas = Pregunta::find(3)->respuestas()->get();

        

        // $datosEncuesta = DB::table('encuesta')->where('id', $encuesta)->first();


        echo "<pre>";
        print_r($respuestas);
        echo "</pre>";
        die();

        return View::make('admin.metricas', array('encuestas' => $encuesta,'preguntas' => $preguntas));
    }


    /* * *
     * * * LISTA DE ENCUESTAS * * *
     * * */
    public function mostrarEncuestas()
    {
        $encuesta = UsuarioEncuesta::all(); 

        return View::make('admin.lista', array('encuestas' => $encuesta));
    }


    /* * *
     * * * VER ENCUESTA* * *
     * * */
    public function verEncuestas($id) //id usuario_encuesta
    {
        //respuestas
        $respuestas = DB::table('respuesta')->where('idUsuarioEncuesta', $id)->get();

         //usuario usuario_encuesta
        $usuarioEncuestas = DB::table('usuario_encuesta')->where('id', $id)->first();
        
        //usuario 
        $usuarioEncuesta = $usuarioEncuestas->idUsuario;
        $usuarios = DB::table('users')->where('id', $usuarioEncuesta )->first();

        return View::make('admin.ver', array( 'usuarios' => $usuarios, 'respuestas' => $respuestas));
    }







}
