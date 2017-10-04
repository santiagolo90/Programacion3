<?php

class producto
{
    private $_nombre;
    private $_precio;
    private $_imagen;

    public function __construct($nombre, $precio, $imagen){
       $this->_nombre = $nombre;
       $this->_precio = $precio; 
       $this->_imagen = $imagen;
    }

    public function getNombre(){
        return $this->_nombre;
    }

    public function getPrecio(){
        return $this->_precio;
    }

    public function getImagen(){
        return $this->_imagen;
    }

    public function ToString()
    {
        return $this->_nombre."-".$this->_precio."-".$this->_imagen;
    }

    static function Gurdar($nombre,$precio,$imagen)
    {
        $produc =  new producto($nombre,$precio,$imagen); 
    
        //array_push($productos,$produc);
        if($archivo = fopen("productos.txt", "a"))
        {
        fwrite($archivo,$produc->ToString()."\n");
        fclose($archivo);
        echo "el producto se guardo\n";
        }
        else
        {
            echo "Error al guardar\n";
        }
    }
    
    
}


?>