<?php
require_once 'empleado.php';
require_once 'archivo.php';
require_once 'AutentificadorJWT.php';

class loginApi//extends login
{

    public function login($request, $response, $args) 
    {
        $token="";
        $ArrayDeParametros = $request->getParsedBody();
        
        if(isset( $ArrayDeParametros['email']) && isset( $ArrayDeParametros['clave']) )
        {
                $email=$ArrayDeParametros['email'];
                $clave= $ArrayDeParametros['clave'];
                $objRespuesta = new stdClass();
                $objRespuesta->Datos= null;
                $objRespuesta->Token = null;
                $objRespuesta->Donde = null;
                
               
                if($validacion = empleado::empleadoExistente($email,$clave))
                {

                    $token= AutentificadorJWT::CrearToken($validacion);
                    $datos= AutentificadorJWT::ObtenerData($token);
                    $a =AutentificadorJWT::ObtenerPayLoad($token);

                    $objRespuesta->Token = $token;
                    $objRespuesta->Datos =$datos;
                    $objRespuesta->Donde =$a->aud;
                    return $response->withJson($objRespuesta ,200);
                }
                else
                {
                    return "Error en usuario o clave";
                    //$newResponse = $response->withJson( $retorno ,409); 
                }
        }
        else
        {
                return "Faltan los datos del empleado y su clave" ;
        }
    }
}