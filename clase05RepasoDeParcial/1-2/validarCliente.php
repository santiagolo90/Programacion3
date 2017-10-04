<?php
/*
recibe por post el correo y la clave, si coincide con algun dato cargado return el msj "cliente loggeado"

*/

//$patente = $_POST['patente'];
//include_once "clienteCarga.php";
/*
<?php
// Ejemplo 1
$pizza  = "porción1 porción2 porción3 porción4 porción5 porción6";
$porciones = explode(" ", $pizza);
echo $porciones[0]; // porción1
echo $porciones[1]; // porción2

// Ejemplo 2
$datos = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $datos);
echo $user; // foo
echo $pass; // *


*/
$correo = $_POST['correo'];
$_clave = $_POST['clave'];
$band = 1;
$Logeado = array();

$archivo =fopen("clientes/clientesActuales.txt", "r");

do {
    if ($band ==1) {
        $clientes = fgets($archivo);
        //list($nombre, $mail, $clave, $sexo) = explode("-", $clientes);
        $Logeado = explode("-", $clientes);
        if ($correo == $Logeado[1]&& $_clave == $Logeado[2]) {
            echo "<br>cliente loggeado";

            fclose($archivo);
            $band=0;
            break;
        }
    } 
    if(feof($archivo))
    {
        echo "No se encontro cliente";
        break;
    }
} while (!feof($archivo));

?>
