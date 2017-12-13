<?php
/*
1- (1pt.) UsuarioCarga.php: (por GET)se ingresa nombre, email, perfil (“admin” o “user”), edad y clave. Se
guardan los datos en en el archivo de texto usuarios.txt, tomando el mail como identificador .

2- (1pts.) VerificarUsuario.php: (por POST)Se ingresa email y clave, si coincide con algún registro del archivo
usuarios.txt retornar “Bienvenido”. De lo contrario informar si el usuario existe o si es error de clave
*/
include_once "usuario.php";

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