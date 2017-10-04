<?php
//github estacionamiento octavio
//var_dump y die para debug
include_once "vehiculo.php";

class estacionamiento
{

    public function estacionamiento()
    {
    }

    public static function guardar($auto)
    {
        echo "Estoy guardando un auto ";
        $archivo =fopen("archivos/estacionados.txt","a");
        $ahora = date("Y-m-d H:i:s");
        fwrite($archivo,$auto->patente."-".$ahora."\n");
        fclose($archivo);
        
    }

    public static function sacar($auto)
    {
        $fileside;
        echo "Estoy facturando un auto ";
        $archivo =fopen("archivos/estacionados.txt","a");
        if(fread($archivo,(6)) == $auto->patente )
        {
            $archivo2 =fopen("archivos/facturados.txt","a");
            $salida = date("Y-m-d H:i:s");
            fwrite($archivo2,$auto->patente."-".$salida."\n");
            fclose($archivo2);
        }
        fclose($archivo);
    }
}

?>