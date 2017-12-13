<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './composer/vendor/autoload.php';
require './clases/AccesoDatos.php';
require './clases/usuarioApi.php';
// require '/clases/MWparaCORS.php';
require './clases/MWparaAutentificar.php';
require './clases/comentarioApi.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);

/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
$app->group('/usuario', function () {
 
  //como agregarle middleware a un solo objeto
  //$this->get('/', \cdApi::class . ':traerTodos')->add(\MWparaCORS::class . ':HabilitarCORSTodos');
  //$this->get('/', \cdApi::class . ':traerTodos')->add(\MWparaAutentificar::class . ':VerificarUsuario');
 
  //como agregarle middleware a un solo objeto
  //$this->get('/{id}', \cdApi::class . ':traerUno')->add(\MWparaCORS::class . ':HabilitarCORSTodos');
  
  $this->get('/traerid/{id}', \UsuarioApi::class . ':TraerUnoID');

  $this->get('/traeremail/{email}', \UsuarioApi::class . ':TraerUnoEmail');

  $this->get('/', \UsuarioApi::class . ':TraerTodos');

  $this->post('/', \UsuarioApi::class . ':CargarUno');

  $this->delete('/', \UsuarioApi::class . ':BorrarUno');

  $this->put('/', \UsuarioApi::class . ':ModificarUno');

  $this->post('/verificarusuario', \UsuarioApi::class . ':VerificarUsuarioApi');
     
});//->add(\MWparaAutentificar::class . ':VerificarUsuario');
//->add(\MWparaAutentificar::class . ':VerificarUsuario')->add(\MWparaCORS::class . ':HabilitarCORS8080');

$app->group('/comentario', function () {

$this->post('/', \ComentarioApi::class . ':CargarUno');

$this->get('/traerusuario/{email}', \ComentarioApi::class . ':TraerUsuario');

$this->get('/traertitulo/{titulo}', \ComentarioApi::class . ':TraerTitulo');

$this->get('/', \ComentarioApi::class . ':TraerComentarios');

});


$app->run();