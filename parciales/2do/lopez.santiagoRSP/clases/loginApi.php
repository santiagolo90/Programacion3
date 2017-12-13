<?php
require_once 'bicicleta.php';
require_once 'AutentificadorJWT.php';
/*
5- (2pts) (POST) Ingresar ID y si este existe devolver un JWT con todos los datos de la bicicleta.
*/
class loginApi
{

    public function login($request, $response, $args) 
    {
        $token="";
        $ArrayDeParametros = $request->getParsedBody();
        
        if(isset( $ArrayDeParametros['id']))
        {
                $id=$ArrayDeParametros['id'];
                $objRespuesta = new stdClass();
                $objRespuesta->Datos= null;
                $objRespuesta->Token = null;
               
                if($validacion = bicicleta::TraerUnaBici($id))
                {
                    
                    $token= AutentificadorJWT::CrearToken($validacion);
                    $datos= AutentificadorJWT::ObtenerData($token);
                    $objRespuesta->Token = $token;
                    $objRespuesta->Datos =$datos;
                    return $response->withJson($objRespuesta ,200);
                }
                else
                {
                    return "Error en id no existe";
                    //$newResponse = $response->withJson( $retorno ,409); 
                }
        }
        else
        {
                return "Falta el ID" ;
        }
    }
}