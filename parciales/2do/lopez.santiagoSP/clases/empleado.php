<?php
//include_once "AccesoDatos.php";
class empleado
{
    
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $foto;
    public $legajo;
    public $clave;
    public $perfil;
    
/*
    public function __construct($id=NULL, $nombre=NULL, $apellido=NULL, $email=NULL, $foto=NULL, $legajo=NULL,$clave =NULL , $perfil=NULL)
    {
        if($id !==NULL && $nombre !==NULL && $apellido !==NULL && $email !==NULL && $foto !==NULL && $legajo !==NULL && $clave !==NULL && $perfil !==NULL){
            
            $this->_id=$id;
            $this->_nombre = $nombre;
            $this->_apellido = $apellido;
            $this->_email = $email;
            $this->_foto = $foto;
            $this->_legajo = $legajo;
            $this->_clave = $clave;
            $this->_perfil = $perfil;
        }
        
    }
*/
    public function InsertarEmpleadoParametros()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleados (nombre,apellido,email,foto,legajo,clave,perfil)values(:nombre,:apellido,:email,:foto,:legajo,:clave,:perfil)");
            $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
            $consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
            $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
            $consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
            $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
            $consulta->execute();	
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
			//return $consulta->fetchAll(PDO::FETCH_CLASS, "empleado");	
    }

    public static function verificarPorMail($email)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$emp = new stdClass();
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id,nombre,apellido,email,foto,legajo,clave,perfil from empleados where email = '$email'");
		$consulta->execute();
		$emp= $consulta->fetchObject('empleado');
        return $emp;
        

        
    }

    public static function TraerTodosLosempleados()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from empleados");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "empleado");		
    }

    public static function TraerEmpleado($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id,nombre,apellido,email,foto,legajo,clave,perfil from empleados where id = $id");
			$consulta->execute();
			$empBuscado= $consulta->fetchObject('empleado');
			return $empBuscado;				

			
    }
    
    public static function TraerEmpleadoPorEmail($email) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id,nombre,apellido,email,foto,legajo,clave,perfil from empleados where email = $email");
			$consulta->execute();
			$empBuscado= $consulta->fetchObject('empleado');
			return $empBuscado;				

			
	}

    public static function BorrarproductoPorID($id)
    {
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
       $consulta =$objetoAccesoDato->RetornarConsulta("
           delete 
           from empleados 				
           WHERE id=:id");	
       $consulta->bindValue(':id',$id, PDO::PARAM_INT);		
       $consulta->execute();
       
       return $consulta->rowCount();
    }

    public static function empleadoExistente($email,$clave){
		// Va a retornar el rol del usuario. Si no existe, retorna null.
		$objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT nombre,apellido,email,foto,legajo,perfil from empleados WHERE email = :email AND clave = :clave");
        $consulta->bindValue(':email', $email, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $clave, PDO::PARAM_STR);
		$consulta->setFetchMode(PDO::FETCH_CLASS, "empleado");
		$consulta->execute();
        return $consulta->fetchObject('empleado');
	}
    
    

   /*
    public  function BorrarEmpleado()
	{
 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			delete 
			from empleado			
			WHERE id=:id");	
			$consulta->bindValue(':id',$this->_id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();
    }
    
    

    public static function TraerEmpleadoEmail($email) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select nombre,sexo,email,clave,turno,perfil from empleado where email = '$email'");
			$consulta->execute();
			$EmpAux= $consulta->fetchObject('empleado');
			return $EmpAux;		
	}
*/
}



?>