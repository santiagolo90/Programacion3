<?php
/*
4.- (POST) /productos/ Agrega un producto a la base de datos (id-nombre-precio)
5.- (GET) /productos/ Retorna un array (json) de todos los productos.
6.- (PUT) /productos/ Modifica un producto
7.- (DELETE) /productos/ Elimina un producto
*/
require_once 'producto.php';                
class productoApi extends producto //implements IApiUsable
{
    public function CargarUno($request, $response, $args)
    {
        $ArrayDeParametros = $request->getParsedBody();
        //$objDelaRespuesta= new stdclass();
        
        $nombre= $ArrayDeParametros['nombre'];
        $precio= $ArrayDeParametros['precio'];
           
        $ProductoAux = new producto();

        $ProductoAux->nombre = $nombre;
        $ProductoAux->precio = $precio;
        //$ProductoAux->InsertarProductoParametros();
        if ($ProductoAux->InsertarProductoParametros()) {
            $response->getBody()->write("Producto cargado correctamente");
        }
        else {
            $response->getBody()->write("Error al cargar producto");
        }

        return $response;
    }

    public function traerTodos($request, $response, $args) 
    {
        $todosLosProductos = producto::TraerTodosLosproductos();
        $response = $response->withJson($todosLosProductos, 200);  
        return $response;
    }

    public function ModificarUno($request, $response, $args) 
    {
            $ArrayDeParametros = $request->getParsedBody();
            $nombre= $ArrayDeParametros['nombre'];
            $precio= $ArrayDeParametros['precio'];
            
            $productoAModificar = new producto();
            $productoAModificar = $productoAModificar->TraerUnproductoPorNombre($nombre);
            if(isset($ArrayDeParametros['precio']))
            {
                $productoAModificar->precio = $precio;
            }

            $resultado =$productoAModificar->ModificarproductoParametros();
            $objDelaRespuesta= new stdclass();
            $objDelaRespuesta->resultado=$resultado;
            return $response->withJson($objDelaRespuesta, 200);	
            
    }

    public function ModificarUnoID($request, $response, $args) 
    {
            $ArrayDeParametros = $request->getParsedBody();
            $id = $args['id'];
            $nombre= $ArrayDeParametros['nombre'];
            $precio= $ArrayDeParametros['precio'];
            
            
            $productoAModificar = new producto();
            $productoAModificar = $productoAModificar->TraerUnproductoPorID($id);
            //var_dump($productoAModificar);
            if($productoAModificar != NULL)
            {
                $productoAModificar->nombre = $nombre;
                $productoAModificar->precio = $precio;
                if ($resultado =$productoAModificar->ModificarproductoParametros() == true) {
                    $response->getBody()->write("Se modifico el producto ");
                }
                else {
                    $response->getBody()->write("NO se modifico el producto ");
                }
                
            }
            else {
                $response->getBody()->write("No existe ID. ");
            }

            
            return $response;	
            
    }




    public function BorrarUno($request, $response, $args) 
    {
            $ArrayDeParametros = $request->getParsedBody(); //form-urlencoded
            $id=$ArrayDeParametros['id'];
            $producto= new producto();
            $producto->id=$id;
            $cantidadDeBorrados=$producto->Borrarproducto();

            $objDelaRespuesta= new stdclass();
            $objDelaRespuesta->cantidad=$cantidadDeBorrados;
            if($cantidadDeBorrados>0)
            {
                    $objDelaRespuesta->resultado="El producto con id: ".$id." fue eliminado exitosamente";
            }
            else
            {
                $objDelaRespuesta->resultado="no Borro nada!!!";
            }
            $newResponse = $response->withJson($objDelaRespuesta, 200);  
            return $newResponse;
    }

    public function BorrarPorID($request, $response, $args) 
    {
            $ArrayDeParametros = $request->getParsedBody(); //delete urlencoded

            $id = $args['id'];

            if(producto::BorrarproductoPorID($id)>0)
            {

                    $response->getBody()->write("Se elimino el producto con ID: ".$id);
            }
            else
            {
                $response->getBody()->write("No se borro nada, el ID: ".$id." no existe");
            }

            return $response;
    }


}
?>