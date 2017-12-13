<?php
/*
(2pts) (POST) Alta de venta de bicicletas (idBicicleta, nombreCliente, fecha, precio) además de
tener asociada una imagen (jpg, jpeg o png) a la venta. El nombre de la foto se conformará por
el ID de la bicicleta y el nombre del cliente. La imagen se guardará en la carpeta ./FotosVentas.
(Esta ruta requiere un JWT valido)
*/
include_once "AccesoDatos.php";
include_once "venta.php";

class ventaApi extends venta
{
    

    public function CargarUno($request, $response, $args)
    {
        $ArrayDeParametros = $request->getParsedBody();
        $objDelaRespuesta= new stdclass();
        
        $idBicicleta= $ArrayDeParametros['idBicicleta'];
        $nombreCliente= $ArrayDeParametros['nombreCliente'];
        $fecha= date("Y-m-d H:i:s");
        $precio= $ArrayDeParametros['precio'];

        $ventaAux = new venta();

        $ventaAux->idBicicleta = $idBicicleta;
        $ventaAux->nombreCliente = $nombreCliente;
        $ventaAux->fecha = $fecha;
        $ventaAux->precio = $precio;



        $foto = $this->obtenerArchivo($idBicicleta, $nombreCliente);
        if($foto != NULL)
        {
            move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
            $ventaAux->foto = $foto;
            $ventaAux->InsertarVentaParametros();
            $response->getBody()->write("Se genero la venta. ");
        }
        else
        {
            $response->getBody()->write("Error al generar la venta. ");
        }

        return $response;
    }

    public function obtenerArchivo($idBicicleta, $nombreCliente) 
	{
        if ( 0 < $_FILES['foto']['error'] ) {
			return null;
		}
		else {
			$foto = $_FILES['foto']['name'];
			
			$extension= explode(".", $foto)  ;

            $nombreNuevo = 'FotosVentas/'.$idBicicleta."-".$nombreCliente.".".$extension[1];
            return $nombreNuevo;
		}
    }


}