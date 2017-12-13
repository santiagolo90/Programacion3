<?php
/*
11.- (MIDDLEWARE)Guardar en otro archivo de texto la fecha, hora, minutos y segundos
más nombre y apellido de todos los que accedan a /productos/(post)
*/
require_once "AutentificadorJWT.php";
class MWdatos
{
    
    public function datosEmpleado($request, $response, $next)
    {


        $objDelaRespuesta= new stdclass();
        if(isset($request->getHeader('token')[0]))
        {
            $arrayConToken = $request->getHeader('token');
            $token=$arrayConToken[0];
        } 
        else 
        {
            $objDelaRespuesta->acceso = "Falta Token.";
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
			
			
			if ($payload=AutentificadorJWT::ObtenerData($token)) 
			{
                $archivo = fopen("Datos.txt", "a");
                $ahora = date("Y-m-d H:i:s");
                fwrite($archivo,$payload->nombre."-".$payload->apellido."-".$ahora."\n");
                fclose($archivo);
                $objDelaRespuesta->respuesta="Se guardaron los Datos";
                $response = $next($request, $response);

			} 
			else 
			{
                $objDelaRespuesta->respuesta="Error al generar el TXT";
                return $response->withJson($objDelaRespuesta, 403);
            }
		} 
            return $response;
    }

    public function tostring($obj)
    {
        $ahora = date("Y-m-d H:i:s");
        return $obj->nombre."-".$obj->apellido."-".$ahora;
    }

    
    
}
