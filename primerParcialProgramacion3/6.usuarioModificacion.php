<?php
/*
6- usuarioModificacion.php (por POST) se ingresarán  todos los valores necesarios
(imagen incluida) para realizar los cambios en los datos de cualquier usuario
*/
include_once "usuario.php";

//Comentarios TXT
$archivoComentario = fopen("Comentario.txt", "r");
$listadoComentario = explode("\n", fread($archivoComentario, filesize("Comentario.txt")));
array_pop($listadoComentario);
//Usuarios TXT
$archivoUsuarios = fopen("usuarios.txt", "r");
$listadoUsuarios = explode("\n", fread($archivoUsuarios, filesize("usuarios.txt")));
array_pop($listadoUsuarios);
//Imagenes TXT
$archivoImagenes = fopen("imagenes.txt", "r");
$listadoImagenes = explode("\n", fread($archivoImagenes, filesize("imagenes.txt")));
array_pop($listadoImagenes);

$_email = $_POST['email'];

$_nombre = $_POST['nombre'];
$_perfil = $_POST['perfil'];
$_edad = $_POST['edad'];
$_clave = $_POST['clave'];

$_titulo = $_POST['titulo'];
$_comentario = $_POST['comentario'];

$destino = "ImagenesDeComentario/".$_FILES['foto']['name'];


if (!empty($_POST)) {
    $archivoUsuarios2 = fopen("usuarios2.txt", "w");
    $archivoComentario2 = fopen("Comentario2.txt", "w");
    $archivoImagenes2 = fopen("imagenes2.txt", "w");
    $extension = "png";
    
    foreach ($listadoUsuarios as $usuarios) {
        list($nombreUser, $emailUser,$perfilUser,$edadUser,$passUser) = explode("-", $usuarios);
        if ($emailUser == $_email) {
            echo "<br>Se modificio el usuario: ".$_email;
            $us = new usuario($_nombre, $_email, $_perfil, $_edad, $_clave);
            fwrite($archivoUsuarios2, $us->tostring()."\n");
        } else {
            $us = new usuario($nombreUser, $emailUser, $perfilUser, $edadUser, $passUser);
            fwrite($archivoUsuarios2, $us->tostring()."\n");
        }
    }

    foreach ($listadoComentario as $comentarios) {
        list($emailComentario, $titulo, $comentario) = explode("-", $comentarios);
        if ($emailComentario == $_email) {
            echo "<br>Se modificio el Comentario De : ".$_email;
            fwrite($archivoComentario2, $_email."-".$_titulo."-".$_comentario."\n");

            move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
            $extension = pathinfo($destino, PATHINFO_EXTENSION);
            if (rename($destino, "ImagenesDeComentario/".$_titulo.".".$extension)) {
                //aca un warning
                //Warning</b>:  rename(ImagenesDeComentario/3.png,ImagenesDeComentario/tituloDosNuevo.png):
                //No existe el archivo o el directorio in line 60
                echo "<br>Foto Guardada";
                fwrite($archivoImagenes2, $_titulo.".".$extension."\n");
            }
        } else {
            fwrite($archivoComentario2, $emailComentario."-".$titulo."-".$comentario."\n");

            foreach ($listadoImagenes as $imagen) {
                list($nombreImagen, $ext) = explode(".", $imagen);
                if ($nombreImagen == $titulo) {
                    $extension = $extension;
                }
            }
            fwrite($archivoImagenes2, $titulo.".".$extension."\n");
        }
    }
}
fclose($archivoComentario);
fclose($archivoComentario2);
rename("Comentario.txt", "papelera/ComentarioModificados.txt");
rename("Comentario2.txt", "Comentario.txt");

fclose($archivoUsuarios);
fclose($archivoUsuarios2);
rename("usuarios.txt", "papelera/usuariosModificados.txt");
rename("usuarios2.txt", "usuarios.txt");


fclose($archivoImagenes);
rename("imagenes.txt", "papelera/imagenesModificados.txt");
rename("imagenes2.txt", "imagenes.txt");

?>
