<?php
/*
2- (1pts.) VerificarUsuario.php: (por POST)Se ingresa email y clave, si coincide con algún registro del archivo
usuarios.txt retornar “Bienvenido”. De lo contrario informar si el usuario existe o si es error de clave.
*/

include_once "1usuario.php";

$_email = $_POST['email'];
$_clave = $_POST['clave'];

$band =3;


$lista = usuario::TraerListaUsuarios();

foreach ($lista as $usuario) {
    if($usuario->getMail() == $_email)
     {
            if($usuario->getClave() == $_clave)
            {
                $band =1;
                break;
            }
            else{
                $band=2;
                break;
            }
     }
     if ($usuario->getMail() != $_email) {
        $band =3;
    }
    
}

if ($band==1) {
    echo "<br>Bienvendio ";
    
}
if ($band==2) {
    echo "<br>Error en clave";
    
}
if ($band==3) {
    echo "<br>El usuario no existe ";
    
}



?>