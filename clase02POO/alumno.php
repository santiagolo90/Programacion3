<?php
include_once "persona.php";

class alumno extends persona
{

    public function __construct($nombre,$apellido,$sexo)
    {
        parent::__construct($nombre,$apellido,$sexo);
        
    }

/*
    public function tostring()
    {
        echo "Nombre".$this->nombre." ";
        echo "Apellido".$this->apellido." ";
        echo "Sexo".$this->sexo." ";
    }
    
*/
}


?>