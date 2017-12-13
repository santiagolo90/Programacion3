<?php
/*
4.- (POST) /productos/ Agrega un producto a la base de datos (id-nombre-precio)
5.- (GET) /productos/ Retorna un array (json) de todos los productos.
6.- (PUT) /productos/ Modifica un producto
7.- (DELETE) /productos/ Elimina un producto
*/
class producto
{
	public $id;
 	public $nombre;
  	public $precio;

      public function InsertarProductoParametros()
      {
              $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
              $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into productos (nombre,precio)values(:nombre,:precio)");
              $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
              $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
              $consulta->execute();	
              return $objetoAccesoDato->RetornarUltimoIdInsertado();
              //return $consulta->fetchAll(PDO::FETCH_CLASS, "empleado");	
      }

      public static function TraerTodosLosproductos()
      {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta =$objetoAccesoDato->RetornarConsulta("select * from productos");
          $consulta->execute();			
          return $consulta->fetchAll(PDO::FETCH_CLASS, "producto");		
      }

      public static function TraerUnproductoPorNombre($nombre) 
      {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre, precio from productos where nombre = '$nombre'");
          $consulta->execute();
          $productoBuscado= $consulta->fetchObject('producto');
          return $productoBuscado;				
      }

      public static function TraerUnproductoPorID($id) 
      {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre, precio from productos where id = '$id'");
          $consulta->execute();
          $productoBuscado= $consulta->fetchObject('producto');
          return $productoBuscado;				
      }

      public function ModificarproductoParametros()
      {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
  
          $consulta =$objetoAccesoDato->RetornarConsulta("
              update productos 
              set nombre=:nombre,
              precio=:precio
              WHERE id=:id");
          $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
          $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
          $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
          return $consulta->execute();
      }

      //BORRAR
  	public function Borrarproducto()
      {
         $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
         $consulta =$objetoAccesoDato->RetornarConsulta("
             delete 
             from productos 				
             WHERE id=:id");	
         $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
         $consulta->execute();
         return $consulta->rowCount();
      }

      public static function BorrarproductoPorID($id)
      {
         $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
         $consulta =$objetoAccesoDato->RetornarConsulta("
             delete 
             from productos 				
             WHERE id=:id");	
         $consulta->bindValue(':id',$id, PDO::PARAM_INT);		
         $consulta->execute();
         return $consulta->rowCount();
      }

}
?>