<?php
/*
5-puede recibir datos del comentario como el usuario, el titulo o nada para hacer
una busqueda, y retornará una tabla con:(la imagen del comentario, el titulo,
la edad del usuario y el nombre)

6- usuarioModificacion.php (por POST) se ingresarán  todos los valores necesarios
(imagen incluida) para realizar los cambios en los datos de cualquier usuario
*/

//$_email = $_POST['email'];
//$_titulo = $_POST['titulo'];
//$_comentario = $_POST['comentario'];


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

echo"
<style>

		table {
            //border-radius: 10px 10px 10px 10px;
            border: 2px solid #000000;
            border-collapse: collapse;
            width: 1000px;
            
		}

		th, td {
            text-align: left;
            border: 2px solid black;
		}

		tr:nth-child(even) {
            background-color: #D3D1A4;
        }
         
        tr:nth-child(odd) {
            background-color: #fff;
        }

		th {
		    background-color: #0C22C2;
		    color: #E6DC0A;
        }
        td {
		    border 1px;
		}

    </style> 
    
<table>
    <h2>Lista de productos</h2>
    <thead>
        <tr>
        
            <th> Imagen</th>
            <th> Titulo</th>
            <th> Edad</th>
            <th> Usuario</th>
            <th> Nombre</th>
        </tr>

    </thead>
    <tbody>
    ";

   
if (empty($_POST)) {
    foreach ($listadoComentario as $key) {
        $tituloImagen;
        $e;
        $n;
        list($emailComentario, $titulo, $comentario) = explode("-", $key);
        //$extension = pathinfo($destino, PATHINFO_EXTENSION);
        foreach ($listadoImagenes as $imagen) {
            list($nombreImagen, $extension) = explode(".", $imagen);
            if ($nombreImagen ==$titulo) {
                $tituloImagen = $nombreImagen.".".$extension;
            }
        }
        foreach ($listadoUsuarios as $usuarios) {
            list($nombreUser, $emailUser,$tipoUser,$edadUser,$passUser) = explode("-", $usuarios);
            if ($emailComentario ==$emailUser) {
                $n = $nombreUser;
                $e = $edadUser;
            }
        }
        
        echo"
        <tr>
            <td> <image src='"."ImagenesDeComentario/".$tituloImagen."'></image></td>
            <td> $titulo</td>
            <td> $e </td>
            <td> $emailComentario </td>
            <td> $n </td>
        </tr>";
    }
    echo "</tbody>
          </table>";
}

if (!empty($_POST)) {
/*
5-puede recibir datos del comentario como el usuario, el titulo o nada para hacer
una busqueda, y retornará una tabla con:(la imagen del comentario, el titulo,
la edad del usuario y el nombre)
*/
    if ($_email = $_POST['email']) {
        foreach ($listadoComentario as $key) {
            $tituloImagen;
            $ed;
            $no;
            $em;

            list($emailComentario, $titulo, $comentario) = explode("-", $key);
            if ($emailComentario == $_email) {
                foreach ($listadoUsuarios as $usuarios) {
                    list($nombreUser, $emailUser,$tipoUser,$edadUser,$passUser) = explode("-", $usuarios);
                    if ($emailComentario ==$emailUser) {
                        $no = $nombreUser;
                        $ed = $edadUser;
                        $em =$emailComentario;
                    }
                }

                foreach ($listadoImagenes as $imagen) {
                    list($nombreImagen, $extension) = explode(".", $imagen);
                    if ($nombreImagen ==$titulo) {
                        $tituloImagen = $nombreImagen.".".$extension;
                    }
                }
        

                echo"
        <tr>
            <td> <image src='"."ImagenesDeComentario/".$tituloImagen."'></image></td>
            <td> $titulo</td>
            <td> $ed </td>
            <td> $em </td>
            <td> $no </td>
        </tr>";
            }
        }
        echo "</tbody>
          </table>";
    }

    if ($_titulo = $_POST['titulo']) {
        foreach ($listadoComentario as $key) {
            $tituloImagen;
            $ed;
            $no;
            $em;

            list($emailComentario, $titulo, $comentario) = explode("-", $key);
            if ($titulo == $_titulo) {

                foreach ($listadoUsuarios as $usuarios) {
                    list($nombreUser, $emailUser,$tipoUser,$edadUser,$passUser) = explode("-", $usuarios);
                    if ($emailComentario ==$emailUser) {
                        $no = $nombreUser;
                        $ed = $edadUser;
                        $em =$emailComentario;
                    }
                }

                foreach ($listadoImagenes as $imagen) {
                    list($nombreImagen, $extension) = explode(".", $imagen);
                    if ($nombreImagen ==$titulo) {
                        $tituloImagen = $nombreImagen.".".$extension;
                    }
                }
        

                echo"
        <tr>
            <td> <image src='"."ImagenesDeComentario/".$tituloImagen."'></image></td>
            <td> $titulo</td>
            <td> $ed </td>
            <td> $em </td>
            <td> $no </td>
        </tr>";
            }
        }
        echo "</tbody>
          </table>";
    }
}
      
fclose($archivoComentario);
fclose($archivoUsuarios);
fclose($archivoImagenes);
?>