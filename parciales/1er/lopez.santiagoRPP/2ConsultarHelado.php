<?php
/*
2- (1pt.) ConsultarHelado.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo
Helados.txt, retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor
*/

include_once "1helados.php";

$_tipo = $_POST['tipo'];
$_sabor = $_POST['sabor'];


$band =0;


$listaHelados = helado::TraerListaHelados();

foreach ($listaHelados as $helado) {
    if($helado->getTipo() == $_tipo && $helado->getSabor() == $_sabor )
     {
        $band = 1;
        break; 
     }
     else {
         if ($helado->getTipo() != $_tipo)  {
            $band =3;
            
         }
         if ($helado->getSabor() != $_sabor) {
            $band =2;
            
         }
     }
     
      
}

if ($band==1) {
    echo "<br>Si Hay";
    
}
if ($band==2) {
    echo "<br>no existe el sabor";
    
}
if ($band==3) {
    echo "<br>no existe el tipo";
    
}



?>

?>