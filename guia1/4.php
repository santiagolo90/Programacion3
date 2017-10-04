<?php
/*
Aplicación No 4 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2 . De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.
*/

$operador = '+';
$operador = '-';
$operador = '*';
$operador = '/';
$op1 = 5;
$op2 = 2;

if($operador = '+')
{
    echo "Operacion ".$op1." + ".$op2;
    $resultado = $op1 + $op2;
    echo "<BR>El resultado es: ".$resultado;
}

if($operador = '*')
{
    echo "<BR></BR>";
    echo "<BR>Operacion ".$op1." * ".$op2;
    $resultado = $op1 * $op2;
    echo "<BR>El resultado es: ".$resultado;
}

if($operador = '-')
{
    echo "<BR></BR>";
    echo "<BR>Operacion ".$op1." - ".$op2;
    $resultado = $op1 - $op2;
    echo "<BR>El resultado es: ".$resultado;
}

if($operador = '/')
{
    echo "<BR></BR>";
    if($op2>0)
    {
    echo "<BR>Operacion ".$op1." / ".$op2;
    $resultado = $op1 / $op2;
    echo "<BR>El resultado es: ".$resultado;
    }
    else
    {
    echo "<BR>No se puede dividir por 0";
    }
}


?>