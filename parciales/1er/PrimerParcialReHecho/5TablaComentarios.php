<?php
/*
5- (2pt.) TablaComentarios.php, puede recibir datos del comentario como el usuario, el titulo o nada para hacer
una busqueda, y retornará una tabla con: (la imagen del comentario, el titulo , la edad del usuario y el nombre )
*/
include_once "3comentario.php";
include_once "1usuario.php";
$listaUsuarios = usuario::TraerListaUsuarios();
$listaComentarios = comentario::TraerListaComentarios();

$archivoImagenes = fopen("imagenes.txt", "r");
$listadoImagenes = explode("\n", fread($archivoImagenes, filesize("imagenes.txt")));
array_pop($listadoImagenes);

$grilla ="
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
    <h2>Lista de Comentarios</h2>
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
    $tituloImagen;
    $auxNombre;
    $auxEdad;

    foreach ($listaComentarios as $comentario) {
        foreach ($listaUsuarios as $usuario) {
            foreach ($listadoImagenes as $imagen) {
                list($nombreImagen, $extension) = explode(".", $imagen);
                if ($nombreImagen ==$comentario->getTitulo()) {
                    $tituloImagen = $nombreImagen.".".$extension;
                }
            }
            
            if ($usuario->getMail() == $comentario->getMail()) {
                $auxNombre = $usuario->getNombre();
                $auxEdad = $usuario->getEdad();

            }
        }
        $grilla .="<tr>
        <td> <image src='"."ImagenesDeComentario/".$tituloImagen."'></image></td>
        <td>".$comentario->getTitulo()."</td>
        <td>".$auxEdad."</td>
        <td>".$comentario->getMail()."</td>
        <td>".$auxNombre."</td>
        
        
    </tr>";
    }


    $grilla .="</tbody>
          </table>";
   
          echo $grilla;
}

if (!empty($_POST)&& isset($_POST['usuario'])) {
    $_email = $_POST['usuario'];
    $tituloImagen;
    
    foreach ($listaUsuarios as $usuario) {
        foreach ($listaComentarios as $comentario) {
            if ($_email ==$usuario->getMail() && $usuario->getMail() == $comentario->getMail()) {
                foreach ($listadoImagenes as $imagen) {
                    list($nombreImagen, $extension) = explode(".", $imagen);
                    if ($nombreImagen ==$comentario->getTitulo()) {
                        $tituloImagen = $nombreImagen.".".$extension;
                    }
                }

                $grilla .="<tr>
                <td> <image src='"."ImagenesDeComentario/".$tituloImagen."'></image></td>
                <td>".$comentario->getTitulo()."</td>
                <td>".$usuario->getEdad()."</td>
                <td>".$comentario->getMail()."</td>
                <td>".$usuario->getNombre()."</td>
                
                
            </tr>";
            }
        }
    }


            $grilla .="</tbody>
    </table>";
            echo $grilla;
}

if (!empty($_POST) && isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    
    foreach ($listaUsuarios as $usuario) {
        foreach ($listaComentarios as $comentario) {
            if ($titulo ==$comentario->getTitulo() && $usuario->getMail() == $comentario->getMail()) {
                foreach ($listadoImagenes as $imagen) {
                    list($nombreImagen, $extension) = explode(".", $imagen);
                    if ($nombreImagen ==$comentario->getTitulo()) {
                        $tituloImagen = $nombreImagen.".".$extension;
                    }
                }
        
                $grilla .="<tr>
                            <td> <image src='"."ImagenesDeComentario/".$tituloImagen."'></image></td>
                            <td>".$comentario->getTitulo()."</td>
                            <td>".$usuario->getEdad()."</td>
                            <td>".$comentario->getMail()."</td>
                            <td>".$usuario->getNombre()."</td>
                            
                            
                        </tr>";
            }
        }
    }
        
        
                $grilla .="</tbody>
                </table>";
                 echo $grilla;
}
