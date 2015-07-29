<?php 
class AdminController extends BaseController {

     /* * *
     * * * METRICAS ENCUESTAS * * *
     * * */
    public function metricasEncuestas()
    {
        $encuesta = UsuarioEncuesta::all(); 
        //Datos encuesta y lista preguntas
        $encuesta = 1;
        $preguntas= DB::table('pregunta')->where('idEncuesta', $encuesta)->get();
        $datosEncuesta = DB::table('encuesta')->where('id', $encuesta)->first();

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
