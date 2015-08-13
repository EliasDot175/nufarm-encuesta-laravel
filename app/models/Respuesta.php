<?php 

class Respuesta extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    protected $table = 'respuesta';
    protected $fillable = array('valor', 'idUsuarioEncuesta', 'idEncuestaPregunta', 'valor', 'comentario');





    public static function si($id){
    	return self::where('valor', 'si')->where('idEncuestaPregunta', $id)->count();
    }
    public static function no($id){
    	return self::where('valor', 'si')->where('idEncuestaPregunta', $id)->count();
    }
}

?>