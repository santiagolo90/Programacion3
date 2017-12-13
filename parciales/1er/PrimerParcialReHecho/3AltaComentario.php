<?php 
/*
3- (1pts.) AltaComentario.php: (por POST)se recibe el email del usuario y el titulo del comentario y en
comentario, si el mail existe en el archivo usuario.txt guarda en el archivo Comentario.txt.
*/
include_once "3comentario.php";
include_once "1usuario.php";

$_email = $_POST["email"];
$comentario = $_POST['comentario'];
$titulo = $_POST['titulo'];

$lista = usuario::TraerListaUsuarios();
$coment = new comentario($_email,$titulo,$comentario);
$band =0;

foreach ($lista as $usuario) 
{
$band =0;
    if($usuario->getMail() == $_email)
     {
         
        echo "Seguarda el cometario para ".$_email."<br>";
        var_dump($coment);
        comentario::Guardar($coment);
        break;
     }
     if($usuario->getMail() != $_email)
     {
         $band =1;
     }
     

    
}
if ($band ==1) {
    echo "No se encontro usuario<br>";
}

?>
