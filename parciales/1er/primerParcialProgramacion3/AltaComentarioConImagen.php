<?php

/*
3- (1pts.) AltaComentario.php: (por POST)se recive el email del usuario y el titulo del comentario y en
comentario, si el mail existe en el archivo usuario.txt guarda en el archivo Comentario.txt.
4- (2pts.) AltaComentarioConImagen.php: con imagen , guardando la imagen con el titulo del comentario en la
carpeta /ImagenesDeComentario
*/
$_email = $_POST['email'];
//$_titulo = $_POST['titulo'];
//$_comentario = $_POST['comentario'];

//toma la imagen enviada por post
$destino = "ImagenesDeComentario/".$_FILES['foto']['name'];

$archivoComentario = fopen("Comentario.txt", "a+");
$imagenes = fopen("imagenes.txt", "a+");
$listado = explode("\n", fread($archivoComentario, filesize("Comentario.txt")));
array_pop($listado);
$band =0;
foreach ($listado as $key) {
    list($em,$t,$com) = explode("-", $key);
    //echo var_dump($key);
    if ($_email == $em) {
        //la mueve al destino
        move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
        //pathinfo con PATHINFO_EXTENSION devuelve la extension del archivo
        $extension = pathinfo($destino, PATHINFO_EXTENSION);
        if (rename("ImagenesDeComentario/".$_FILES['foto']['name'], "ImagenesDeComentario/".$t.".".$extension)) {
            echo "Foto Guardada\n";
            fwrite($imagenes,$t.".".$extension."\n");
            $band =1;
        } else {
            echo "Error al guarda la foto\n";
        }
    }
}
if ($band==0) {
    echo "No se guardo foto. No existe usuario!!\n";
}
fclose($archivoComentario);
fclose($imagenes);
?>
