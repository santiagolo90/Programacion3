<?php

include_once "Validador/validar.php";

class Calculadora
{
    static function Multiplicar($numeroUno,$numeroDos)
    {
    echo "<BR>El resultado de la Multiplicacion es: ".$numeroDos* $numeroUno;
    }

    static function Dividir($numeroUno,$numeroDos)
    {
      $vali = new validar();
         if(!($vali->esCero($numeroDos)))
         {
             echo "El resultado de la division es: ".$numeroUno / $numeroDos;
         }
         else
         {
             echo "No se puede dividir por cero";
         }
    }
}
?>
