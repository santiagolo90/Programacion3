<?php
class Usuario
{
	public $Nombre;
 	public $Email;
  	public $Perfil;
    public $Edad;
	public $Clave;
	public $Id;
	
	// public function __construct($nombre, $email, $perfil, $edad, $clave)
	// {
	// 	$this->Nombre = $nombre;
	// 	$this->Email = $email;
	// 	$this->Perfil = $perfil;
	// 	$this->Edad = $edad;
	// 	$this->Clave = $clave;
	// }

	public function __construct()
	{

	}

  	public function BorrarUsuario()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from usuarios 				
				WHERE ID=:id");	
				$consulta->bindValue(':id',$this->Id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarUsuario()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuarios 
				set Nombre='$this->Nombre',
				Perfil='$this->Email',
				Edad='$this->Edad',
				Clave='$this->Clave'
				WHERE Email='$this->Email'");
			return $consulta->execute();

	 }

	 public function InsertarElUsuarioParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (Nombre,Email,Perfil,Edad,Clave)values(:nombre,:email,:perfil,:edad,:clave)");
				$consulta->bindValue(':nombre',$this->Nombre, PDO::PARAM_STR);
				$consulta->bindValue(':email', $this->Email, PDO::PARAM_STR);
                $consulta->bindValue(':perfil', $this->Perfil, PDO::PARAM_STR);
                $consulta->bindValue(':edad', $this->Edad, PDO::PARAM_INT);
                $consulta->bindValue(':clave', $this->Clave, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }


  	public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select Nombre, Email, Perfil, Edad, Clave from usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
			//return $consulta->fetchAll();		
	}

	public static function TraerUnUsuarioID($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select Nombre, Email, Perfil, Edad, Clave from usuarios where ID = $id");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('Usuario');
			return $usuarioBuscado;		
	}

	public static function TraerUnUsuarioEmail($email) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select Nombre, Email, Perfil, Edad, Clave from usuarios where Email = '$email'");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('Usuario');
			return $usuarioBuscado;		
	}

	public static function VerificarUsuario($email,$clave)
	{
		if(Usuario::TraerUnUsuarioEmail($email) != NULL)
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuarios where Email = '$email' AND Clave = '$clave'");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('Usuario');
			if($usuarioBuscado != NULL)
			{
				return "<h3>Bienvenido</h3>";
			}
			else
			{
				return "<h3>El usuario existe pero la contraseña es incorrecta</h3>";
			}
		}
		else
		{
			return "<h3>El usuario ingresado no existe</h3>";
		}

	}
			
}