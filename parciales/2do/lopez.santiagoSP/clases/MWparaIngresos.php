<?php
/*
10.- (MIDDLEWARE) Guardar en archivo de texto la cantidad de veces que se accedió al api
Rest (/productos/
*/
require_once "AutentificadorJWT.php";
class MWparaIngresos
{
    
    public function CantidadIngresos($request, $response, $next)
    {

        $archivo = "contador.txt"; //el archivo que contiene en numero
        $f = fopen($archivo, "r"); //abrimos el archivo en modo de lectura
        if($f)
        {
            $contador = fread($f, filesize($archivo)); //leemos el archivo
            $contador = $contador + 1; //sumamos +1 al contador
            fclose($f);
        }
        $f = fopen($archivo, "w+");
        if($f)
        {
            fwrite($f, $contador);
            fclose($f);
        }
            //$response= $contador;
            return $response->withJson($contador ,200);
    }

    
    
}
