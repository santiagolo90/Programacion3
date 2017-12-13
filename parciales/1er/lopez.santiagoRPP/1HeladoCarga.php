<?php
/*
1- (1pt.) HeladoCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“crema” o “agua”), cantidad( de kilos). Se
guardan los datos en en el archivo de texto Helados.txt, tomando el sabor y tipo como identificador .
*/

include_once "1helados.php";

$sabor = $_GET['sabor'];
$precio = $_GET['precio'];
$tipo = $_GET['tipo'];
$cantidad = $_GET['cantidad'];



if (!empty($_GET)) {
    $he = new helado($sabor,$precio,$tipo,$cantidad);
    helado::guardar($he);
}

?>
