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
include_once "AccesoDatos.php";
include_once "empleado.php";
include_once "archivo.php";
class empleadoApi extends empleado
{
    

    public function CargarUno($request, $response, $args)
    {
        $ArrayDeParametros = $request->getParsedBody();
        $objDelaRespuesta= new stdclass();
        
        $nombre= $ArrayDeParametros['nombre'];
        $apellido= $ArrayDeParametros['apellido'];
        $email= $ArrayDeParametros['email'];
        //$foto= $ArrayDeParametros['foto'];
        $legajo= $ArrayDeParametros['legajo'];
        $clave= $ArrayDeParametros['clave'];
        $perfil= $ArrayDeParametros['perfil'];
   
        $EmpleadoAux = new empleado();

        $EmpleadoAux->nombre = $nombre;
        $EmpleadoAux->apellido = $apellido;
        $EmpleadoAux->email = $email;
        $EmpleadoAux->legajo = $legajo;
        $EmpleadoAux->clave = $clave;
        $EmpleadoAux->perfil = $perfil;


        $foto = $this->obtenerArchivo($request, $response, $nombre);
        if($foto != NULL)
        {
            move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
            $EmpleadoAux->foto = $foto;
            $EmpleadoAux->InsertarEmpleadoParametros();
            $response->getBody()->write("Se guardo el Empleado. ");
        }
        else
        {
            $response->getBody()->write("Error al intentar guardar archivo. ");
        }

        return $response;
    }

    public function obtenerArchivo($request, $response, $nombre) 
	{
        if ( 0 < $_FILES['foto']['error'] ) {
			return null;
		}
		else {
			$foto = $_FILES['foto']['name'];
			
			$extension= explode(".", $foto)  ;

            $nombreNuevo = 'fotos/'.$nombre.".".$extension[1];
            return $nombreNuevo;
		}
        /*
		$uploadedFiles = $request->getUploadedFiles();
		$uploadedFile = $uploadedFiles['foto'];
		
		if ($uploadedFile->getError() === UPLOAD_ERR_OK) 
		{
			$foto = archivo::moveUploadedFile($uploadedFile, $nombre);
			return $foto;
		}
		else
		{
			return NULL;
        }	
        */
	}

  public function Verificar($request, $response, $args) {
    $ArrayDeParametros = $request->getParsedBody();
    //var_dump($ArrayDeParametros);
       $email= $ArrayDeParametros['email'];
       $clave= $ArrayDeParametros['clave'];
       $Emp=empleado::verificarPorMail($email);
       $objRespuesta = new stdClass();
       //var_dump($Emp);
       $objRespuesta->Valido= null;
       $objRespuesta->empleado = null;
       
    
    
    if ($Emp != NULL&& $Emp->clave == $clave) {
        $objRespuesta->Valido = "true";
        $objRespuesta->empleado = $Emp;
        
    }
    else {
        $objRespuesta->Valido = "false";
        $objRespuesta->empleado ="No existe";
        
    }
    $newresponse = $response->withJson($objRespuesta, 200);  
    //return json_encode($objRespuesta);
    return $newresponse;
}

    public function traerTodos($request, $response, $args) 
    {
        $todosLosEmpleados = empleado::TraerTodosLosempleados();
        $response = $response->withJson($todosLosEmpleados, 200);  
        return $response;
    }

    public function BorrarPorID($request, $response, $args) 
    {
            $ArrayDeParametros = $request->getParsedBody(); //form-urlencoded
            //$id=$ArrayDeParametros['id'];
            $id = $args['id'];
            $empBuscado = empleado::TraerEmpleado($id);
            //var_dump($empBuscado);
            
            //$productoBorrar= new producto();
            //$productoBorrar->id=$id;
            //$cantidadDeBorrados=BorrarproductoPorID($id);

            //$objDelaRespuesta= new stdclass();
            //$objDelaRespuesta->cantidad=$cantidadDeBorrados;
            
            if(empleado::BorrarproductoPorID($id)>0)
            {
                    //$objDelaRespuesta->resultado="El producto con id: ".$id." fue eliminado exitosamente";
                    $response->getBody()->write("Se elimino el Empleado con ID: ".$id);
                    //muevo la foto a la papelera
                    $extension = pathinfo($empBuscado->foto, PATHINFO_EXTENSION);
                    rename($empBuscado->foto , "fotos/papelera/".trim($empBuscado->nombre)."-".date("Ymd_His").".".$extension);
            }
            else
            {
                $response->getBody()->write("No se borro nada, el ID: ".$id." no existe");
            }
            //$newResponse = $response->withJson($objDelaRespuesta, 200);  
            return $response;
            
    }


}



?>