<?php
/*
Clase Empleado

Atributos (todos protegidos)
Constructor (inicializa los atributos de la clase)
Métodos (de instancia)
Hablar (polimorfismo). Retorna un string con el formato “El empleado habla Español”, siendo Español, el valor recibido por parámetro.
ToString (polimorfismo). Retorna un string mostrando todos los datos del empleado, separados por un guión medio (-).
getters para cada uno de los atributos.
*/
include "Persona.php";

class Empleado extends Persona
{
    protected $_legajo;
    protected $_sueldo;

    public function Empleado($nombre,$apellido,$dni,$sexo,$legajo,$sueldo)
    {
        parent::Persona($nombre,$apellido,$dni,$sexo);
        $this->_legajo = $legajo;
        $this->_sueldo = $sueldo;

    }

    public function getLegajo()
    {
        return $this->_legajo;
    }

    public function getSueldo()
    {
        return $this->_sueldo;
    }

    public function Hablar($idioma)
    {
        echo "El empleado habla ".$idioma;
    }
    
    public function ToString()
    {
        echo  $this->_nombre."-".$this->_apellido."-".$this->_dni."-".$this->_sexo."-".$this->_legajo."-".$this->_sueldo."<br>";
    }
}




?>