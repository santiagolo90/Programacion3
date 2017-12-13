<?php
/*
4- (2pts.) AltaComentarioConImagen.php: con imagen , guardando la imagen con el titulo del comentario en la
carpeta /ImagenesDeComentario.
*/
include_once "3comentario.php";
include_once "1usuario.php";

$_email = $_POST["email"];
//$comentario = $_POST['comentario'];
//$titulo = $_POST['titulo'];
//toma la imagen enviada por post
$destino = "ImagenesDeComentario/".$_FILES['foto']['name'];

$imagenes = fopen("imagenes.txt", "a+");
$band =0;

$lista = comentario::TraerListaComentarios();

foreach ($lista as $item) {
    
    if ($item->getMail() == $_email) {
        //la mueve al destino
        move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
        //pathinfo con PATHINFO_EXTENSION devuelve la extension del archivo
        $extension = pathinfo($destino, PATHINFO_EXTENSION);
        if (rename("ImagenesDeComentario/".$_FILES['foto']['name'], "ImagenesDeComentario/".$item->getTitulo().".".$extension)) {
            echo "Foto Guardada\n";
            fwrite($imagenes, $item->getTitulo().".".$extension."\n");
            $band =1;
            break;
        }
        if ($item->getMail() != $_email){
            $band =0;
        }
    }
}
if ($band==0) {
    echo "No se guardo foto. No existe usuario!!\n";
}
fclose($imagenes);
?>