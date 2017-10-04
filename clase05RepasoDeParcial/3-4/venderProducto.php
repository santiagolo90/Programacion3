<?php
/*
 recibe por get el nombre del producto y la cantidad, hace llamadas a metodos y retorna  el precio total a pagar
*/
include_once "producto.php";

$nombre = $_GET['nombre'];
$cantidad = $_GET['cantidad'];

//Crea un producto llamando a la clase statica de la clase producto y el metodo propio SioNoExiste
$producto = SioNoExiste(producto::retornarArray(), $nombre);

if ($producto != null) {
    echo "El total a pagar es:  ".Total($producto, $cantidad);
} else {
    echo "No se encontro el producto";
}
function SioNoExiste($arrayProductos, $nombre)
{
    foreach ($arrayProductos as $producto) {
        if ($producto->getNombre() == $nombre) {
            return $producto;
        }
    }
    return null;
}
function Total($producto, $cantidad)
{
    return $producto->PrecioMasIva($producto->getPrecio()) * $cantidad;
    //return ($producto->getPrecio() + $producto->precioMasIva($producto->getPrecio())) * $cantidad;
}
