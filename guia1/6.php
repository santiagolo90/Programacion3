<?php
/*
Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand ). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/
$MiArray = [rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9)];
$min=0;
$max=0;
$igual=0;

for ($i=0; $i <5 ; $i++) { 
  # cod...
    if($MiArray[$i]==6)
    {
        $igual ++;
    }
    if($MiArray[$i]>6)
    {
        $max ++;
    }
    if($MiArray[$i]<6)
    {
        $min ++;
    }


}

echo "Cantidad de numeros Igual a 6: ".$igual;
echo "<BR>Cantidad de numeros mayor a 6: ".$max;
echo "<BR>Cantidad de numeros menor a 6: ".$min;
echo "<BR>";
var_dump($MiArray);
?>