<?php
include_once "alumno.php";
include_once "profesor.php";

class aula
{
    public $alumnos= array();
    public $_profesor;
    //public $_aula;

    public function __construct()
    {
        //$this->$alumnos = array();
        //$this->$profesores = array();
        //$this->$_aula = array();
    }

    public function AgregarAlumno($alumno)
    {
        array_push($alumnos, $alumno);
    }

    public function AgregarProfesor($profesor)
    {
        array_push($_profesor, $profesor);
    }

    public function tostring()
    {
        echo "Alumnos del aula<BR>";
        foreach ($alumnos as $dato) {
            echo $dato->nombre ," ", $dato->apellido," ", $dato->sexo, "<br>";
        }
        echo"<br>";
        echo"Profesor: <br>";
        echo $_profesor->nombre ," ", $_profesor->apellido," ", $_profesor->sexo, "<br>";
        echo"<br>";
    }

/*
    public function BuscarAlumno($alumno)
    {
        foreach ($alumnos as $dato) 
        {
            if($alumno == $dato)
            {
                return true;
            }
            return false;
        }
    }

    public function BuscarProfesor($profesor)
    {
        foreach ($profesores as $dato) 
        {
            if($profesor == $dato)
            {
                return true;
            }
            return false;
        }
    }
    */

}


?>