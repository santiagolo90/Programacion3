<?php

require_once "AutentificadorJWT.php";
class MWparaAutentificar
{
    public function Verificarempleado($request, $response, $next)
    {
         
        $objDelaRespuesta= new stdclass();
        if(isset($request->getHeader('token')[0]))
        {
            $arrayConToken = $request->getHeader('token');
            $token=$arrayConToken[0];
        } 
        else 
        {
            $objDelaRespuesta->acceso = "Acceso denegado a este sitio.";
            return $response->withJson($objDelaRespuesta, 403);
        }
                
        try 
        {
            AutentificadorJWT::VerificarToken($token);
            $objDelaRespuesta->esValido=true;
        } 
        catch (Exception $e) 
        {
            $objDelaRespuesta->esValido=false;
            $objDelaRespuesta->error = $e->getMessage();
            return $response->withJson($objDelaRespuesta, 403);
        }

		if ($objDelaRespuesta->esValido) 
		{
			$payload=AutentificadorJWT::ObtenerData($token);
			
			if (strtolower($payload->perfil)=="admin") 
			{
                $response = $next($request, $response);
			} 
			else 
			{
                $objDelaRespuesta->respuesta="Acceso permitido solo a administradores";
                return $response->withJson($objDelaRespuesta, 403);
            }
		} 
		
            return $response;
    }
}
