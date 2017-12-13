<?php
/*
3- (1pts.) AltaComentario.php: (por POST)se recive el email del usuario y el titulo del comentario y en
comentario, si el mail existe en el archivo usuario.txt guarda en el archivo Comentario.txt.
4- (2pts.) AltaComentarioConImagen.php: con imagen , guardando la imagen con el titulo del comentario en la
carpeta /ImagenesDeComentario.
*/

include_once "1usuario.php";

class comentario
{
    private $_email;
    private $_titulo;
    private $_comentario;

    public function __construct($email, $titulo, $comentario)
    {
        $this->_email = $email;
        $this->_titulo = $titulo;
        $this->_comentario = $comentario;

    }

    public function getMail()
    {
        return $this->_email;
    }

    public function getTitulo()
    {
        return $this->_titulo;
    }

    public function getComentario()
    {
        return $this->_comentario;
    }



    public function tostring()
    {
        return $this->_email."-".$this->_titulo."-".$this->_comentario;
    }

    public static function Guardar($obj)
    {
        $resultado = FALSE;
        $archivo = fopen("comentario.txt", "a");
        $comet = fwrite($archivo, $obj->tostring()."\n");
        if($comet > 0)
        {
            $resultado = TRUE;			
        }
        fclose($archivo);
        return $resultado;
    }


    public static function TraerListaComentarios()
	{
		
		$ListaComentarios = array();
		//leo todos los productos del archivo
		$archivo=fopen("comentario.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);

			/*fgets devuelve false si lee una línea vacía, cuándo puede suceder esto si existe
			la sentencia while(!feof($archivo)) mas arriba?, la realidad es que un renglon
			vacío cuenta como una línea en el archivo, por ende evaluar que fgets sea distinto
			de false es necesario ya que si lee una línea vacía devuelve false*/
			if ($archAux != false) 
			{
				$comentarios = explode("-", $archAux);
				
				$comentarios[0] = trim($comentarios[0]);
				$comentarios[1] = trim($comentarios[1]);
				$comentarios[2] = trim($comentarios[2]);

				if($comentarios[0] != "")
				{				
					$ListaComentarios[] = (new Comentario($comentarios[0], $comentarios[1],$comentarios[2]));
				}
			} 
		}
			
		fclose($archivo);
		
		return $ListaComentarios;
	}
}


?>