<?php
//GET para pedir (no viajan encriptados)
//para alta baja o modificacion _POST
include "estacionamiento.php";

$patente = $_POST['patente'];
$accion =$_POST['accion'];


//include_once "vehiculo.php";

$auto = new vehiculo($patente);
//$accion = "sacar";


    if($accion == "guardar")
    {
        estacionamiento::guardar($auto);
    }
    else
    {
        estacionamiento::sacar($auto);
    }



var_dump($_GET);
var_dump($_POST);

echo "hola.http"


?>

