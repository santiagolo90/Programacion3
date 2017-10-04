<?php
/*
2- (1pts.) VerificarUsuario.php: (por POST)Se ingresa email y clave, si coincide con algún registro del archivo
usuarios.txt retornar “Bienvenido”. De lo contrario informar si el usuario existe o si es error de clave.
*/

$_email = $_POST['email'];
$_clave = $_POST['clave'];

$band =3;

$archivo = fopen("usuarios.txt", "r");
$listado = explode("\n", fread($archivo, filesize("usuarios.txt")));
//Error Notice: Undefined offset: 2 borro el ultimo campo en blanco del array por el \n
array_pop($listado);

foreach ($listado as $key) 
{
    list($no,$em,$p,$ed,$cl) = explode("-", $key);
    //echo var_dump($key);
    if ($_email == $em) {
        if ($_clave == $cl) {
            //echo "<br>Bienvendio ".$no;
            $band =1;
            break;
        }
        else{
        //echo "<br>Error en clave de ".$no;
        $band=2;
        break;
        }
        
    }
    if ($_email != $em) {
        $band ==3;
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
fclose($archivo);


?>