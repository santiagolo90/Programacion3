<?php

//include_once "/../Validador/validar.php";

class Calculadora
{
    static function Multiplicar($numeroUno,$numeroDos)
    {
    echo "<BR>El resultado de la Multiplicacion es: ".$numeroDos* $numeroUno;
    } 

    static function Dividir($numeroUno,$numeroDos)
    {
    echo "<BR>El resultado de la Div es: ".$numeroDos / $numeroUno;
    }    
}
?>