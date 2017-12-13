<?php


class MWparaAutentificar
{

	//forma de documentar
 /**
   * @api {any} /MWparaAutenticar/  Verificar Usuario
   * @apiVersion 0.1.0
   * @apiName VerificarUsuario
   * @apiGroup MIDDLEWARE
   * @apiDescription  Por medio de este MiddleWare verifico las credeciales antes de ingresar al correspondiente metodo 
   *
   * @apiParam {ServerRequestInterface} request  El objeto REQUEST.
 * @apiParam {ResponseInterface} response El objeto RESPONSE.
 * @apiParam {Callable} next  The next middleware callable.
   *
   * @apiExample Como usarlo:
   *    ->add(\MWparaAutenticar::class . ':VerificarUsuario')
   */
	public function VerificarUsuario($request, $response, $next) {
         
		  if($request->isGet())
		  {
				 $response = $next($request, $response);
				 $response->getBody()->write('<p>NO necesita credenciales para los get </p>');
		  }
		  else
		  {
		    $response->getBody()->write('<p>verifico credenciales</p>');
		    $ArrayDeParametros = $request->getParsedBody();
		    $email=$ArrayDeParametros['email'];
		    $clave=$ArrayDeParametros['clave'];
		    if($tipo=="administrador")
		    {		      
					$response = $next($request, $response);
					$response->getBody()->write("<h3>Bienvenido $nombre </h3>");
		    }
		    else
		    {
		      $response->getBody()->write('<p>no tenes habilitado el ingreso</p>');
		    }  
		  }
		  $response->getBody()->write('<p>vuelvo del verificador de credenciales</p>');
		  return $response;   
	}

}