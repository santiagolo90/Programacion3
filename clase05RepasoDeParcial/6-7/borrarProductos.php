<?php
/*
si recibe un nombre por get retorna si el producto esta en la lista, 
si lo recibe por post con el parametro"Que debo hacer" igual a borrar se debe borrar al producto 
y mover la foto al subdirectorio productos borrados con el nombre formado por el producto y la fecha de borrado
*/
include_once "../5-6/producto.php";
//$nombre = $_GET["nombre"];
//$nombre = $_POST["nombre"];

if (!empty($_GET)) {
    $nombre = $_GET["nombre"];
    $archivo = fopen("../5-6/productos.txt", "r");
    $listado = explode("\n", fread($archivo, filesize("../5-6/productos.txt")));
    //Error Notice: Undefined offset: 2 borro el ultimo campo en blanco del array por el \n
    array_pop($listado);
    foreach ($listado as $key) {
        list($n, $p, $i) = explode("-", $key);
        if ($nombre == $n) {
            echo "<br>El producto ".$n." esta en la lista ";
            break;
        }
    }
          
    fclose($archivo);
}

if (!empty($_POST) && $_POST["queDeboHacer"] == 'borrar') {
    $nombre = $_POST["nombre"];
    $archivo = fopen("../5-6/productos.txt", "a+");
    $archivo2 = fopen("productos_temp.txt", "a+");
    $listado = explode("\n", fread($archivo, filesize("../5-6/productos.txt")));
    //Error Notice: Undefined offset: 2 borro el ultimo campo en blanco del array por el \n
    array_pop($listado);
    $destino = "productosBorrados/";
    /*
    foreach ($listado as $key) {
        list($n, $p, $i) = explode("-", $key);
        if ($nombre == $n) {
            echo "<br>Se borra el producto ".$n;
            $extension = pathinfo($i, PATHINFO_EXTENSION);
            $ahora = date("Y-m-d");
            rename("../5-6/".$i, "productosBorrados/".$n."_".$ahora.".".$extension);
            //unset($n);
            //unset($p);
            //unset($i);
            break;
        }
    }
    */
    for ($i=0; $i < 5; $i++) {
        //$band =0;
        $aux = explode("-", $listado[$i]);
        if ($aux[0]== $nombre)
        {
            echo "<br>Se borra el producto ";
            $extension = pathinfo($aux[2], PATHINFO_EXTENSION);
            $ahora = date("Y-m-d");
            rename("../5-6/".$aux[2], "productosBorrados/".$nombre."_".$ahora.".".$extension);
        }
        else
        {
            fwrite($archivo2,$listado[$i]."\n");
        }
        
        
    }
    fclose($archivo2);
    fclose($archivo);
    
    rename("../5-6/productos.txt", "../5-6/productosBorrados");
    rename("productos_temp.txt", "../5-6/productos.txt");
    
}
?>
