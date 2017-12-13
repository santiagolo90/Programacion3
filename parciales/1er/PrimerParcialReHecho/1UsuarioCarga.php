<?php
/*
1- (1pt.) UsuarioCarga.php: (por GET)se ingresa nombre, email, perfil (“admin” o “user”), edad y clave. Se
guardan los datos en en el archivo de texto usuarios.txt, tomando el mail como identificador .
*/


include_once "1usuario.php";

$nombre = $_GET['nombre'];
$email = $_GET['email'];
$perfil = $_GET['perfil'];
$edad = $_GET['edad'];
$clave = $_GET['clave'];



if (!empty($_GET)) {
    //$archivo = fopen("usuarios.txt", "a");
    $us = new usuario($nombre,$email,$perfil,$edad,$clave);
    usuario::guardar($us);
}




?>
