<?php
/*
Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date ) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/

//$date = new DateTime();
$date = date('d/m/y');
echo $date;

echo "<BR></BR>";

$date = date('l-F-Y');
echo $date;

echo "<BR></BR>";

$mes   = date('m');
$dia   = date('dia');

switch ($mes)
{
    case '01':
        echo "Estacion Vernao <br>";
        break;

    case '02':
        echo "Estacion Vernao <br>";
        break;

    case '03':
    if($dia >= 23)
    {
        echo "Estacion Otoño <br>";
    }
    else
    {
        echo "Estacion Verano <br>";
    }
        break;

    case '04':
        echo "Estacion Otoño <br>";
        break;

    case '05':
        echo "Estacion Otoño <br>";
        break;

    case '06':
    if($dia >=21)
    {
        echo "Estacion Invierno <br>";
    }
    else
    {
        echo "Estacion Otoño <br>";
    }
        break;

    case '07':
        echo "Estacion Invierno <br>";
        break;

    case '08':
        echo "Estacion Invierno <br>";
        break;

    case '09':
    if($dia >=21)
    {
        echo "Estacion Primavera <br>";
    }
    else
    {
        echo "Estacion Invierno <br>";
    }
        break;

    case '10':
        echo "Estacion Primavera <br>";
        break;

    case '11':
        echo "Estacion Primavera <br>";
        break;

    case '12':
    if($dia >=21)
    {
        echo "Estacion Verano <br>";
    }
    else
    {
        echo "Estacion Primavera <br>";
    }
        break;       
} 

?>