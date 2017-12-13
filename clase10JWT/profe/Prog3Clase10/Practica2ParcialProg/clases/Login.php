<?php
require_once 'usuario.php';

    class Login 
    {
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
?>