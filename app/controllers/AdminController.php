<?php 
class AdminController extends BaseController {

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
    public function verEncuesta($id) //id usuario_encuesta
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
