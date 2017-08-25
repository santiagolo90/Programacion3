<?php 
/*
Aplicación No 3 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a , $b y $c realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
*/

$a= 5;
$b= 1;
$c= 5;

// $a= 6;
// $b= 9;
// $c= 8;

$band=0;

echo "variable a: $a";
echo "<br>variable b: $b";
echo "<br>variable c: $c";

if($a > $b && $a > $c)
{
    if($b > $c)
    {
        echo "<br> La variable B es la del medio: ".$b;
        $band =1;
    }
    if($c > $b)
    {
        echo "<br> La variable C es la del medio: ".$c;
        $band =1;
    }
    
}

if($b > $a && $b > $c)
{
    if($a > $c)
    {
        echo "<br> La variable A es la del medio: ".$a;
        $band =1;
    }
    if($c > $a)
    {
        echo "<br> La variable C es la del medio: ".$c;
        $band =1;
    }
}

if($c > $a && $c > $b)
{
    if($a > $b)
    {
        echo "<br> La variable A es la del medio: ".$a;
        $band =1;
    }
    if($b > $a)
    {
        echo "<br> La variable B es la del medio: ".$b;
        $band =1;
    }
}

if($band ==0)
{
echo "<br> No hay valor medio";
}


?>