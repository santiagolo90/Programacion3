<?php
/*
recibe por get-- los siguentes datos, nombre mail clave sexo. 
crea el objeto de tipo cliente y guarda en el archivo clientes/clientesActuales.txt en un renglon distinto

2- Validar cliente.php

*/
include_once "cliente.php";

$nombre = $_GET['nombre'];
$mail = $_GET['mail'];
$clave = $_GET['clave'];
$sexo = $_GET['sexo'];


$cl = new cliente($nombre,$mail,$clave,$sexo);

echo "Guardo un Cliente";
$archivo =fopen("clientes/clientesActuales.txt","a");
fwrite($archivo,$cl->ToString());
var_dump($archivo);
fclose($archivo);

    
    
    
    



?>