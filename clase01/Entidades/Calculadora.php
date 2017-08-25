<?php

include_once "/../Validador/validar.php";

class Calculadora
{
    static function Multiplicar($numeroUno,$numeroDos)
    {
    echo "<BR>El resultado de la Multiplicacion es: ".$numeroDos* $numeroUno;
    }

    static function Dividir($numeroUno,$numeroDos)
    {
      $vali = new validar();
         if(!($vali->esCero($numDos)))
         {
             echo $numUno / $numDos;
         }
         else
         {
             echo "No se puede dividir por cero";
         }
    }
}
?>
