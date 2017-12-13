<?php
/*
3- (1pts.) AltaComentario.php: (por POST)se recive el email del usuario y el titulo del comentario y en
comentario, si el mail existe en el archivo usuario.txt guarda en el archivo Comentario.txt.
4- (2pts.) AltaComentarioConImagen.php: con imagen , guardando la imagen con el titulo del comentario en la
carpeta /ImagenesDeComentario
*/

$_email = $_POST['email'];
$_titulo = $_POST['titulo'];
$_comentario = $_POST['comentario'];

$archivo = fopen("usuarios.txt", "r");
$archivoComentario = fopen("Comentario.txt", "a");

$listado = explode("\n", fread($archivo, filesize("usuarios.txt")));
array_pop($listado);

$band =0;
foreach ($listado as $key) 
{
    list($no,$em,$p,$ed,$cl) = explode("-", $key);
    //echo var_dump($key);
    if ($_email == $em) {
        if (fwrite($archivoComentario,$_email."-".$_titulo."-".$_comentario."\n")) {
            echo "Comentario Cargado"."\n";
            $band=1;
            break;
        }
        else {
            echo "Error al guardar Archivo";
            break;
        }
        
    }
    
    
}
if ($band==0) {
    echo "No se guardo comentario, No existe usuario!!\n";
}
fclose($archivo);
fclose($archivoComentario);


?>