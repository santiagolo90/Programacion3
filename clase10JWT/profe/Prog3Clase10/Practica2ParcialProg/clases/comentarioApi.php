<?php
require_once 'comentario.php';
require_once 'usuario.php';
//require_once 'IApiUsable.php';

class ComentarioApi extends Comentario //implements IApiUsable
{
    public function CargarUno($request, $response, $args) 
    {

      $ArrayDeParametros = $request->getParsedBody();
      //var_dump($ArrayDeParametros);
      $email= $ArrayDeParametros['email'];

      if(Usuario::TraerUnUsuarioEmail($email) != NULL)
      {
                $titulo= $ArrayDeParametros['titulo'];
                $comentario= $ArrayDeParametros['comentario'];
                
                $miComentario = new Comentario();
                //$miComentario = new Comentario($nombre,$email,$edad,$perfil,$clave);
                $miComentario->Email = $email;
                $miComentario->Titulo = $titulo;
                $miComentario->Comentario = $comentario;
        
                $archivos = $request->getUploadedFiles();
        
        
                $nombreAnterior=$archivos['foto']->getClientFilename();
                $extension = pathinfo($nombreAnterior, PATHINFO_EXTENSION);
        
                //mkdir("./imagenesDeComentario/");
        
                $destino="./imagenesDeComentario/".$titulo.".".$extension;
        
                //$ar = fopen("./imagenesDeComentario/usuarios.txt", "w");
                //fwrite($ar,"Hola");
                //fclose($ar);
            
                $archivos['foto']->moveTo($destino);
        
                $miComentario->Path = $destino;
        
                //$extension= explode(".", $nombreAnterior);
            
                //$archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
                //$response->getBody()->write("se guardo el cd");
            
                $miComentario->InsertarElComentarioParametros();
                $response->getBody()->write("<h3>Comentario cargado correctamente</h3>");
        }
        else
        {
            $response->getBody()->write("<h3>El Email ingresado no existe</h3>");
        }

        return $response;
    }

    public function TraerComentarios($request, $response, $args)
    {
        $grilla = '<table class="table">
        <thead style="background:rgb(14, 26, 112);color:#fff;">
            <tr>
                <th>  USUARIO </th>
                <th>  TITULO     </th>
                <th>  COMENTARIO      </th>
                <th>  FOTO      </th>
            </tr>  
        </thead>';

        $todosLosComentarios = Comentario::TraerTodos();

        foreach($todosLosComentarios as $comentario)
        {
          $grilla .= "<tr>
          <td>".$comentario->Email."</td>
          <td>".$comentario->Titulo."</td>
          <td>".$comentario->Comentario."</td>
          <td><img src=".'.'.$comentario->Path." width='100px' height='100px'/></td>
          </tr>";
        }

        return $grilla;
    }

    public function TraerUsuario($request, $response, $args)
    {
        $grilla = '<table class="table">
        <thead style="background:rgb(14, 26, 112);color:#fff;">
            <tr>
                <th>  USUARIO </th>
                <th>  TITULO     </th>
                <th>  COMENTARIO      </th>
                <th>  FOTO      </th>
            </tr>  
        </thead>';

        $email = $args['email'];
        $comentarios = Comentario::TraerComentariosEmail($email);

        foreach($comentarios as $comentario)
        {
          $grilla .= "<tr>
          <td>".$comentario->Email."</td>
          <td>".$comentario->Titulo."</td>
          <td>".$comentario->Comentario."</td>
          <td><img src=".'../.'.$comentario->Path." width='100px' height='100px'/></td>
          </tr>";
        }
        
        return $grilla;
    }

    public function TraerTitulo($request, $response, $args)
    {
        $grilla = '<table class="table">
        <thead style="background:rgb(14, 26, 112);color:#fff;">
            <tr>
                <th>  USUARIO </th>
                <th>  TITULO     </th>
                <th>  COMENTARIO      </th>
                <th>  FOTO      </th>
            </tr>  
        </thead>';

        $titulo = $args['titulo'];
        $comentarios = Comentario::TraerComentariosTitulo($titulo);

        foreach($comentarios as $comentario)
        {
          $grilla .= "<tr>
          <td>".$comentario->Email."</td>
          <td>".$comentario->Titulo."</td>
          <td>".$comentario->Comentario."</td>
          <td><img src=".'../.'.$comentario->Path." width='100px' height='100px'/></td>
          </tr>";
        }

        return $grilla;
    }

}