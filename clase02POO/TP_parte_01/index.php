<?php
include_once "Empleado.php";

$empUno = new Empleado("Santiago","Lopez",3225416,"Masculino",1010,5.20);



$empUno->ToString();

$empUno::Hablar("Español");



?>