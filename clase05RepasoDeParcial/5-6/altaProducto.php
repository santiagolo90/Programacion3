<?php
/*
recibe por post el nombre el precio y la foto del producto
guardar la foto con el nombre del producto
*/
include_once "producto.php";

//$productos = array();
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$imagen;

//toma la imagen enviada por post
$destino = "IMG/".$_FILES['foto']['name'];
//la mueve al destino
move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);

//pathinfo con PATHINFO_EXTENSION devuelve la extension del archivo
$extension = pathinfo($destino, PATHINFO_EXTENSION);

//cambia de nombre
if (rename ("IMG/".$_FILES['foto']['name'], "IMG/".$nombre.".".$extension)) {
    echo "el nombre del fichero ha sido cambiado\n";
} else {
    echo "Se ha producido un error al intentar cambiar el nombre\n";
}

//nombre de la imagen con nombre de producto
$imagen = "IMG/".$nombre.".".$extension;

$producto = producto::Gurdar($nombre, $precio, $imagen);
