<?php

abstract class persona
{
    public $_nombre;
    public $_apellido;
    public $_sexo;
    
    public function __construct($nombre,$apellido,$sexo)
    {
        $this->_nombre=$nombre;
        $this->_apellido=$apellido;
        $this->_sexo=$sexo;
    }

    
}




?>