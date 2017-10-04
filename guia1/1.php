<?php

//Aplicación No 1 (Sumar números)
//Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
//supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números 
//se sumaron

$numero = 999;

for ($i= $numero; $i < 1000 ; $i++) { 
    $numero = $numero + $i;
    echo "<BR>Se sumo: ".$i;
}
echo "<BR>Numeros sumados: ".$numero;

?>