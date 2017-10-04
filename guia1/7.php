<?php
/*
Aplicación No 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for ) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/> ). Repetir la impresión de los números utilizando
las estructuras while y foreach .
*/
$MiArrayImpar = array();
$band = 0;


//var_dump($MiArrayImpar);
echo " <br> For";
for ($i=1; $i <21 ; $i++) 
{
    if($i % 2 != 0)
    {
        array_push($MiArrayImpar,$i);
        echo "<br>".$i;
    }

    
}
echo " <br> While";
while ($band < 10) 
{
    echo "<br>".$MiArrayImpar[$band];
    $band++;
}

echo "<br>foreach";
foreach ($MiArrayImpar as $Dato) 
{
    echo"<BR>".$Dato;
}
echo"<BR>";
var_dump($MiArrayImpar);

?>