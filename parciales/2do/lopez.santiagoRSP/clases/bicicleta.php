<?php

class bicicleta// extends AnotherClass implements Interface
{
    public $id;
    public $color;
    public $rodado;
    public $marca;

    //INSERTAR
	public function InsertarBicicletaParametros()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into bicis (color,rodado,marca) values(:color,:rodado,:marca)");
		$consulta->bindValue(':color',$this->color, PDO::PARAM_STR);
        $consulta->bindValue(':rodado', $this->rodado, PDO::PARAM_STR);
        $consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

    //Traer Todos
    public static function TraerTodasLasBicicletas()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from bicis");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "bicicleta");		
    }
    //Traer Color
    public static function TraerUnColor($color)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM bicis WHERE color = '$color'");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, "bicicleta");	
    }

    public static function TraerUnaBici($id)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT id, color, rodado, marca 
													    FROM bicis 
													    WHERE id = '$id'");
        $consulta->execute();
        $biciBuscada= $consulta->fetchObject('bicicleta');
        return $biciBuscada;
    }

    public static function BorrarBici($id)
    {
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
       $consulta =$objetoAccesoDato->RetornarConsulta("
           delete 
           from bicis 				
           WHERE id=:id");	
       $consulta->bindValue(':id',$id, PDO::PARAM_INT);		
       $consulta->execute();
       return $consulta->rowCount();
    }

    
}




?>