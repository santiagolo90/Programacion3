<?php
require_once "AccesoDatos.php";
require_once "bicicleta.php";

class bicicletaApi extends bicicleta// implements Interface
{
    public static function CargarUno($request, $response, $args)
    {
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $color= $ArrayDeParametros['color'];
        $rodado= $ArrayDeParametros['rodado'];
        $marca= $ArrayDeParametros['marca'];
    
        $bicicletaAux = new bicicleta();
    
        $bicicletaAux->color = $color;
        $bicicletaAux->rodado = $rodado;
        $bicicletaAux->marca = $marca;

    
        $bicicletaAux->InsertarBicicletaParametros();
        $response->getBody()->write("Se guardo la Bici. ");
    
        return $response;
    }

    public function traerTodos($request, $response, $args) 
	{
			$todasBicicletas = bicicleta::TraerTodasLasBicicletas();
			$response = $response->withJson($todasBicicletas, 200);  
			return $response;
    }
    
    public function traerColor($request, $response, $args) 
	{
			$color = $args['color'];
			$biciAux = bicicleta::TraerUnColor($color);
			return $response->withJson($biciAux, 200);
    }
    
    public function traerUno($request, $response, $args) 
	{
			$id = $args['id'];
			$biciAux = bicicleta::TraerUnaBici($id);
			return $response->withJson($biciAux, 200);
    }
    
    public function BorrarUno($request, $response, $args) 
    {
            $ArrayDeParametros = $request->getParsedBody(); //para delete urlencoded
            $id=$ArrayDeParametros['id'];

            $objDelaRespuesta= new stdclass();
            if(bicicleta::BorrarBici($id)>0)
            {
                    $objDelaRespuesta->resultado="Con Bicicleta con id: ".$id." fue eliminado exitosamente";
            }
            else
            {
                $objDelaRespuesta->resultado="Error al Borrar la bicileta";
            }
            $newResponse = $response->withJson($objDelaRespuesta, 200);  
            return $newResponse;
    }
    
}


?>