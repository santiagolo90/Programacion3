<?php
/*
recibe nombre mail clave y sexo de un cliente, busca por mail y si existen los datos se guardan lo nuevos datos ingresados
y la foto se guarda con el nuevo nombre ( no recibe foto)

*/

/*
    Recibe nombre y precio, busca por nombre y si existen los datos, se guardan los nuevos 
    datos ingresados y la foto se guarda con el nuevo nombre.
*/
include_once "../5-6/producto.php";
$nombre = $_POST["nombre"];
$nombre2 = $_POST["nombre2"];
$precio = $_POST["precio"];

$archivo = fopen("../5-6/productos.txt", "a+");
$archivo2 = fopen("productos_temp.txt", "a+");
$listado = explode("\n", fread($archivo, filesize("../5-6/productos.txt")));
//Error Notice: Undefined offset: 2 borro el ultimo campo en blanco del array por el \n
array_pop($listado);

for ($i=0; $i < 5; $i++) {
    $aux = explode("-", $listado[$i]);
    if ($aux[0]== $nombre)
    {
        echo "<br>Se modifica el producto ";
        //obtengo la extension
        $extension = pathinfo($aux[2], PATHINFO_EXTENSION);
        //cambio de nombre a la imagen
        rename("../5-6/".$aux[2], "../5-6/IMG/".$nombre2.".".$extension);
        //guardo todo
        fwrite($archivo2,$nombre2."-".$precio."-"."IMG/".$nombre2.".".$extension."\n");
    }
    else
    {
        fwrite($archivo2,$listado[$i]."\n");
    }
    
    
}
fclose($archivo2);
fclose($archivo);

rename("../5-6/productos.txt", "../5-6/productosModificacdos");
rename("productos_temp.txt", "../5-6/productos.txt");



?>
