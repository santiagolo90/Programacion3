<?php
/*
1- (1pt.) HeladoCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“crema” o “agua”), cantidad( de kilos). Se
guardan los datos en en el archivo de texto Helados.txt, tomando el sabor y tipo como identificador .
2- (1pt.) ConsultarHelado.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo
Helados.txt, retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor
*/


class helado 
{
    public $_sabor;
    public $_precio;
    public $_tipo;
    public $_cantidad;

//Constructor
    public function __construct($sabor,$precio,$tipo,$cantidad)
    {
        $this->_sabor = $sabor;
        $this->_precio = $precio;
        $this->_tipo = $tipo;
        $this->_cantidad = $cantidad;
    }
//getters
    public function getSabor()
    {
        return $this->_sabor;
    }

    public function getPrecio()
    {
        return $this->_precio;
    }

    public function getTipo()
    {
        return $this->_tipo;
    }

    public function getCantidad()
    {
        return $this->_cantidad;
    }

//tostring
    public function tostring()
    {
        return $this->_sabor."-".$this->_precio."-".$this->_tipo."-".$this->_cantidad;
    }
//guardar
    public static function guardar($obj)
    {
        $archivo = fopen("Helados.txt", "a");
        if (fwrite($archivo,$obj->tostring()."\n")) {
            echo "Helado Cargado"."\n";
        }
        else{
            echo "Error al cargar Helado"."\n"; 
        }
        fclose($archivo);
    }

//trae usuarios en array
    public static function TraerListaHelados()
    {
        
        $ListaDeHelados = array();
        //leo todos los productos del archivo
        $archivo=fopen("Helados.txt", "r");
        
        while(!feof($archivo))
        {
            if($archAux = fgets($archivo))
            {
                $Helados = explode("-", $archAux);
                $Helados[0] = trim($Helados[0]);
                $Helados[1] = trim($Helados[1]);
                $Helados[2] = trim($Helados[2]);
                $Helados[3] = trim($Helados[3]);
                if($Helados[0] != "")
                {				
                    $ListaDeHelados[] = (new helado($Helados[0], $Helados[1],$Helados[2],$Helados[3]));
                }
    
            }
        } 
        fclose($archivo);
    
        return $ListaDeHelados;
    }
}



?>