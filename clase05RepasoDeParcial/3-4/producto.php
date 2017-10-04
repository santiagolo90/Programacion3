<?php
/*
posee 2 atrubiutos privados, implementa la interfaz IVENDIBLE precio mas iva 
y tiene un metodo que se llama retornar array de productos
que retorna un array con 5 productos
*/

interface IVendible
{
    public function PrecioMasIva($pre);
}

class producto implements IVendible
{
    private $_precio;
    private $_nombre;
    

    public function __construct($nombre,$precio)
    {
    $this->_nombre = $nombre;
    $this->_precio = $precio;
    
    }

    //Getter porque los atributos son privados
    public function getNombre(){
        return $this->_nombre;
    }

    public function getPrecio(){
        return $this->_precio;
    }

    public function PrecioMasIva($precio)
    {
        return $precio = $precio + ($precio * 0.21);
    }

    
    public static function retornarArray()
    {
        $productos = array();
        $pr1 =  new producto("Producto1",10); 
        $pr2 =  new producto("Producto2",20);
        $pr3 =  new producto("Producto3",30);
        $pr4 =  new producto("Producto4",40);
        $pr5 =  new producto("Producto5",50);

        //array_push($productos,$pr1,$pr2,$pr3,$pr4,$pr5);
        array_push($productos,$pr1);
        array_push($productos,$pr2);
        array_push($productos,$pr3);
        array_push($productos,$pr4);
        array_push($productos,$pr5);
        return $productos;
    }
    
    
}


?>