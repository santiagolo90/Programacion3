<?php
require_once 'usuario.php';
//require_once 'IApiUsable.php';

class UsuarioApi extends Usuario //implements IApiUsable
{
 	public function TraerUnoID($request, $response, $args) {
     	$id=$args['id'];
    	$miUsuario=Usuario::TraerUnUsuarioID($id);
     	$newResponse = $response->withJson($miUsuario, 200);  
    	return $newResponse;
    }

    
    public function TraerUnoEmail($request, $response, $args) {
       $email=$args['email'];
       $miUsuario=Usuario::TraerUnUsuarioEmail($email);
       $newResponse = $response->withJson($miUsuario, 200);
       return $newResponse;
   }

     public function TraerTodos($request, $response, $args) {
      	$todosLosUsuarios=Usuario::TraerTodoLosUsuarios();
     	$response = $response->withJson($todosLosUsuarios, 200);  
    	return $response;
    }

    
      public function CargarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $nombre= $ArrayDeParametros['nombre'];
        $email= $ArrayDeParametros['email'];
		$edad= $ArrayDeParametros['edad'];
		$perfil= $ArrayDeParametros['perfil'];
		$clave= $ArrayDeParametros['clave'];
        
        $miUsuario = new Usuario();
        //$miusuario = new Usuario($nombre,$email,$edad,$perfil,$clave);
        $miUsuario->Nombre = $nombre;
        $miUsuario->Email = $email;
        $miUsuario->Edad = $edad;
        $miUsuario->Perfil = $perfil;
        $miUsuario->Clave = $clave;

        $miUsuario->InsertarElUsuarioParametros();

        //$archivos = $request->getUploadedFiles();
        //$destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);

        // $nombreAnterior=$archivos['foto']->getClientFilename();
        // $extension= explode(".", $nombreAnterior)  ;
        //var_dump($nombreAnterior);
        // $extension=array_reverse($extension);

        // $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
        // $response->getBody()->write("se guardo el cd");

        return $response;
    }

      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$miUsuario= new Usuario();
     	$miUsuario->Id=$id;
     	$cantidadDeBorrados=$miUsuario->BorrarUsuario();

     	$objDelaRespuesta= new stdclass();
	    $objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    if($cantidadDeBorrados>0)
	    	{
	    		 $objDelaRespuesta->resultado="algo borro!!!";
	    	}
	    	else
	    	{
	    		$objDelaRespuesta->resultado="no Borro nada!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;
    }
     
     public function ModificarUno($request, $response, $args) {
         //$response->getBody()->write("<h1>Modificar  uno</h1>");
         
        $ArrayDeParametros = $request->getParsedBody();
        $email= $ArrayDeParametros['email'];
        //var_dump($ArrayDeParametros);
        $miUsuario = new Usuario();
        $miUsuario = $miUsuario->TraerUnUsuarioEmail($email);

        //$nombre= $ArrayDeParametros['nombre'];
		// $edad= $ArrayDeParametros['edad'];
		// $perfil= $ArrayDeParametros['perfil'];
        // $clave= $ArrayDeParametros['clave'];
        
        if (isset($ArrayDeParametros['nombre']))
        {
            $miUsuario->Nombre = $ArrayDeParametros['nombre'];
        }
        if (isset($ArrayDeParametros['edad']))
        {
            $miUsuario->Edad = $ArrayDeParametros['edad'];
        } 
        if (isset($ArrayDeParametros['perfil']))
        {
            $miUsuario->Perfil = $ArrayDeParametros['perfil'];
        }
        if (isset($ArrayDeParametros['clave']))
        {
            $miUsuario->Clave = $ArrayDeParametros['clave'];
        }
        
	   	$resultado = $miUsuario->ModificarUsuario();
	   	$objDelaRespuesta= new stdclass();
		//var_dump($resultado);
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);
    }

    public function VerificarUsuarioApi($request, $response)
    {
        $ArrayDeParametros = $request->getParsedBody();
        $email = $ArrayDeParametros['email'];
        $clave = $ArrayDeParametros['clave'];

        $respuesta = Usuario::VerificarUsuario($email,$clave);
        $response->getBody()->write($respuesta);
        return $response;
    }
}
