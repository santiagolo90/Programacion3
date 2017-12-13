<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './composer/vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './clases/bicicletaApi.php';
require_once './clases/loginApi.php';
require_once './clases/ventaApi.php';
require_once './clases/MWparaAutentificar.php';
//
//require_once './clases/MWparaCors.php';
//require_once './clases/AutentificadorJWT.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);



//$app->post('/ingreso/', \loginApi::class . ':login');
$app->get('[/]', function (Request $request, Response $response) {
    $response->getBody()->write("Bienvenido");
    return $response;
});

$app->post('/Login[/]', \loginApi::class . ':login');


$app->group('/bici', function () {
    
    $this->post('[/]', \bicicletaApi::class . ':CargarUno');
    $this->get('/', \bicicletaApi::class . ':traerTodos');
    $this->get('/{color}/', \bicicletaApi::class . ':traerColor');
    $this->get('/{id}', \bicicletaApi::class . ':traerUno');
    $this->delete('/', \bicicletaApi::class . ':BorrarUno')->add(\MWparaAutentificar::class . ':Verificar');

    //$this->delete('/', \bicicletaApi::class . ':BorrarUno');
    //$this->put('/', \bicicletaApi::class . ':ModificarUno');
});//->add(\MWparaAutentificar::class . ':Verificarempleado');

$app->group('/venta', function () {
/*
(2pts) (POST) Alta de venta de bicicletas (idBicicleta, nombreCliente, fecha, precio) además de
tener asociada una imagen (jpg, jpeg o png) a la venta. El nombre de la foto se conformará por
el ID de la bicicleta y el nombre del cliente. La imagen se guardará en la carpeta ./FotosVentas.
(Esta ruta requiere un JWT valido)
*/
$this->post('[/]', \ventaApi::class . ':CargarUno');
   
})->add(\MWparaAutentificar::class . ':Verificar');


$app->run();

?>