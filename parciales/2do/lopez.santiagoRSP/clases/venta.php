<?php
include_once "AccesoDatos.php";
class venta
{
    
    public $idBicicleta;
    public $nombreCliente;
    public $fecha;
    public $precio;
    public $foto;
    
    public function InsertarVentaParametros()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventas (idBicicleta,nombreCliente,fecha,precio,foto)values(:idBicicleta,:nombreCliente,:fecha,:precio,:foto)");
            $consulta->bindValue(':idBicicleta',$this->idBicicleta, PDO::PARAM_INT);
            $consulta->bindValue(':nombreCliente', $this->nombreCliente, PDO::PARAM_STR);
            $consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
            $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
            $consulta->execute();	
            return $objetoAccesoDato->RetornarUltimoIdInsertado();
			//return $consulta->fetchAll(PDO::FETCH_CLASS, "empleado");	
    }

    
}