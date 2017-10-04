<?php
/*
Clase Persona

Atributos (todos privados)
Constructor (inicializa los atributos de la clase)
Métodos (de instancia)
Hablar (abstracto). Retorna un string.
ToString. Retorna un string mostrando todos los datos de la persona, separados por un guión medio (-).
getters para cada uno de los atributos.
*/

abstract class Persona
{
    private $_apellido;
    private $_dni;
    private $_nombre;
    private $_sexo;

    public function Persona($nombre,$apellido,$dni,$sexo)
    {
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_dni = $dni;
        $this->_sexo = $sexo;
    }

    public function getApellido()
    {
        return $this->_apellido;
    }

    public function getDni()
    {
        return $this->_dni;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function getSexo()
    {
        return $this->_sexo;
    }

    public abstract function Hablar($idioma);

    public function ToString()
    {
        echo  $this->_nombre."-".$this->_apellido."-".$this->_dni."-".$this->_sexo."<br>";
    }
}

?>