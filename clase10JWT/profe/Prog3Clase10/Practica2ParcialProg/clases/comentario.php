<?php
class Comentario
{
	public $Email;
 	public $Titulo;
  	public $Comentario;
    public $Path;
	
	public function __construct()
	{

    }
    
    public function InsertarElComentarioParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into comentarios (Email,Titulo,Comentario,Path)values(:email,:titulo,:comentario,:path)");
        $consulta->bindValue(':email',$this->Email, PDO::PARAM_STR);
        $consulta->bindValue(':titulo', $this->Titulo, PDO::PARAM_STR);
        $consulta->bindValue(':comentario', $this->Comentario, PDO::PARAM_STR);
        $consulta->bindValue(':path', $this->Path, PDO::PARAM_STR);
        $consulta->execute();

        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

  	// public function BorrarUsuario()
	//  {
	//  		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("
	// 			delete 
	// 			from usuarios 				
	// 			WHERE ID=:id");	
	// 			$consulta->bindValue(':id',$this->Id, PDO::PARAM_INT);		
	// 			$consulta->execute();
	// 			return $consulta->rowCount();
	//  }

	// public function ModificarUsuario()
	//  {

	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("
	// 			update usuarios 
	// 			set Nombre='$this->Nombre',
	// 			Perfil='$this->Email',
	// 			Edad='$this->Edad',
	// 			Clave='$this->Clave'
	// 			WHERE Email='$this->Email'");
	// 		return $consulta->execute();

	//  }

  	// public static function TraerTodoLosUsuarios()
	// {
	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("select Nombre, Email, Perfil, Edad, Clave from usuarios");
	// 		$consulta->execute();			
	// 		return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
	// 		//return $consulta->fetchAll();		
	// }

	// public static function TraerUnUsuarioID($id) 
	// {
	// 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 		$consulta =$objetoAccesoDato->RetornarConsulta("select Nombre, Email, Perfil, Edad, Clave from usuarios where ID = $id");
	// 		$consulta->execute();
	// 		$usuarioBuscado= $consulta->fetchObject('Usuario');
	// 		return $usuarioBuscado;		
	// }

	public static function TraerComentariosEmail($email) 
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from comentarios where Email = '$email'");
		$consulta->execute();
		$comentarioBuscado= $consulta->fetchAll(PDO::FETCH_CLASS, "Comentario");
		return $comentarioBuscado;
	}

	public static function TraerComentariosTitulo($titulo)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from comentarios where Titulo = '$titulo'");
		$consulta->execute();
		$comentarioBuscado= $consulta->fetchAll(PDO::FETCH_CLASS, "Comentario");
		return $comentarioBuscado;		
	}

	public static function TraerTodos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from comentarios");
		$consulta->execute();
		$comentarios = $consulta->fetchAll(PDO::FETCH_CLASS, "Comentario");
		return $comentarios;
	}
}