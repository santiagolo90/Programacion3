<?php

include "Funciones.php";
include_once "Funciones.php";

require "Funciones2.php";
require_once "Funciones2.php";

include "Entidades/Calculadora.php";
include "Validador/validar.php";

//require_once solo llama 1 vez
$calc = new Calculadora();
$calc->Multiplicar(2,5);
//Para llamar al metodo static como si fuera de instancia de un objeto es con ->
Calculadora::Multiplicar(2,5);
//Con los :: es la manera de llamar un metodo static
//calc.Multiplicar(2,5);
Sumar(100,100);
Restar(100,100);

$vali = new validar();
$vali->esCero(0);




?>