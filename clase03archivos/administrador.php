<?php

include_once "estacionamiento.php";
//include_once "vehiculo.php";

$auto = new vehiculo("abc123");
$accion = "sacar";


    if($accion == "guardar")
    {
        estacionamiento::guardar($auto);
    }
    else
    {
        estacionamiento::sacar($auto);
    }


?>