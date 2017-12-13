<?php
 /*
1.- (POST) Agrega un empleado a la BD (id-nombre-apellido-email-foto-legajo-clave-perfil)
2.- (POST) /email/clave/ Verifica empleado (email-clave). Retorna un json
{valido:true/false, usuario:{datos}}
3.- (GET) Retorna un array de json conteniendo el listado completo de los empleados.
4.- (POST) /productos/ Agrega un producto a la base de datos (id-nombre-precio)
5.- (GET) /productos/ Retorna un array (json) de todos los productos.
6.- (PUT) /productos/ Modifica un producto
7.- (DELETE) /productos/ Elimina un producto
*/
        use \Psr\Http\Message\ServerRequestInterface as Request;
        use \Psr\Http\Message\ResponseInterface as Response;

        require_once './vendor/autoload.php';
        require_once './clases/AccesoDatos.php';
        require_once './clases/empleadoApi.php';
        require_once './clases/productoApi.php';
        require_once './clases/loginApi.php';
        require_once './clases/MWparaCORS.php';
        require_once './clases/MWparaAutentificar.php';
        require_once './clases/MWparaIngresos.php';
        require_once './clases/MWdatos.php';


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
        $app->get('[/]', function (Request $request, Response $response) {
                  $response->getBody()->write("Bienvenido");
                  return $response;
        });

        $app->post('/Login[/]', \loginApi::class . ':login')->add(\MWparaCORS::class . ':HabilitarCORSTodos');

        $app->group('/empleado', function () {
                $this->post('/', \empleadoApi::class . ':CargarUno');
                $this->post('/Verificar', \empleadoApi::class . ':Verificar');
                $this->get('/', \empleadoApi::class . ':traerTodos')->add(\MWdatos::class . ':datosEmpleado');
                $this->delete('/id/{id}', \empleadoApi::class . ':BorrarPorID');
                    
                });//->add(\MWparaAutentificar::class . ':Verificarempleado');

        $app->group('/producto', function () {

                /*
                4.- (POST) /productos/ Agrega un producto a la base de datos (id-nombre-precio)
                5.- (GET) /productos/ Retorna un array (json) de todos los productos.
                6.- (PUT) /productos/ Modifica un producto
                7.- (DELETE) /productos/ Elimina un producto
                */
                $this->post('/', \productoApi::class . ':CargarUno');
                $this->get('/', \productoApi::class . ':traerTodos');
                $this->put('/', \productoApi::class . ':ModificarUno');
                $this->put('/id/{id}', \productoApi::class . ':ModificarUnoID');
                $this->delete('/', \productoApi::class . ':BorrarUno');
                $this->delete('/id/{id}', \productoApi::class . ':BorrarPorID');
                });//->add(\MWparaAutentificar::class . ':Verificarempleado');


        $app->run();
?>