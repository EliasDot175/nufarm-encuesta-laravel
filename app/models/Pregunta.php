<?php 

class Pregunta extends Eloquent { //Todos los modelos deben extender la clase Eloquent
    protected $table = 'pregunta';
    protected $fillable = array('nombre');
}

?>