<?php
include_once "persona.php";

class profesor extends persona
{

    public function __construct($nombre,$apellido,$sexo)
    {
        parent::__construct($nombre,$apellido,$sexo);

    }
    
    /*
    public function tostring()
    {
        echo "Nombre".$this->$nombre." ";
        echo "Apellido".$this->$nombre." ";
        echo "Sexo".$this->$nombre." ";
    }
    */
}


?>