<?php
/*
Se necesita tener el listado diez aulas, con los alumnos y el profesor a cargo,
Para buscar por nombre y/o apellido y/o sexo  :
Un alumno en todas las aulas.
Un alumno en un aula.
Un profesor en las aulas.
Cantidad de veces que aparece un alumno en las aulas.   
Una persona en las alulas.
Cantidad y listado de personas con el mismo apellido y/o nombre y/o sexo.

Se debe crear la jerarquía de clases, sabiendo que una de las clases es abstracta. 

*/

include "aula.php";

$aulaUno = new aula();
$a1 = new alumno("Santiago","Lopez","Masculino");
//$a1->tostring();
$a2 = new alumno("Juan","Perez","Masculino");
$a3 = new alumno("Roberto","Carlos","Masculino");
$p1 = new profesor("Ernesto","Guevara","Masculino");

$aulaUno->AgregarAlumno($a1);
$aulaUno->AgregarAlumno($a2);
$aulaUno->AgregarAlumno($a3);

$aulaUno->AgregarProfesor($p1);

//$aulaUno->tostring();
var_dump($aulaUno);



?>