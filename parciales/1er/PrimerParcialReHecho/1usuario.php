<?php
/*
1- (1pt.) UsuarioCarga.php: (por GET)se ingresa nombre, email, perfil (“admin” o “user”), edad y clave. Se
guardan los datos en en el archivo de texto usuarios.txt, tomando el mail como identificador .
2- (1pts.) VerificarUsuario.php: (por POST)Se ingresa email y clave, si coincide con algún registro del archivo
usuarios.txt retornar “Bienvenido”. De lo contrario informar si el usuario existe o si es error de clave.
*/

class usuario 
{
    public $_nombre;
    public $_email;
    public $_perfil;
    public $_edad;
    public $_clave;

//Constructor
    public function __construct($nombre,$email,$perfil,$edad,$clave)
    {
        $this->_nombre = $nombre;
        $this->_email = $email;
        $this->_perfil = $perfil;
        $this->_edad = $edad;
        $this->_clave = $clave;
    }
//getters
    public function getMail()
    {
        return $this->_email;
    }

    public function getClave()
    {
        return $this->_clave;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function getEdad()
    {
        return $this->_edad;
    }

//tostring
    public function tostring()
    {
        return $this->_nombre."-".$this->_email."-".$this->_perfil."-".$this->_edad."-".$this->_clave;
    }
//guardar
    public static function guardar($obj)
    {
        $archivo = fopen("usuarios.txt", "a");
        //fwrite($archivo,$us->tostring()."\n");
        if (fwrite($archivo,$obj->tostring()."\n")) {
            echo "Usuario Cargado"."\n";
        }
        else{
            echo "Error al cargar usuario"."\n"; 
        }
        fclose($archivo);
    }

//trae usuarios en array
    public static function TraerListaUsuarios()
    {
        
        $ListaDeUsuarios = array();
        //leo todos los productos del archivo
        $archivo=fopen("usuarios.txt", "r");
        
        while(!feof($archivo))
        {
            if($archAux = fgets($archivo))
            {
                $Usuarios = explode("-", $archAux);
                $Usuarios[0] = trim($Usuarios[0]);
                $Usuarios[1] = trim($Usuarios[1]);
                $Usuarios[2] = trim($Usuarios[2]);
                $Usuarios[3] = trim($Usuarios[3]);
                $Usuarios[4] = trim($Usuarios[4]);
                if($Usuarios[0] != "")
                {				
                    $ListaDeUsuarios[] = (new usuario($Usuarios[0], $Usuarios[1],$Usuarios[2],$Usuarios[3],$Usuarios[4]));
                }
    
            }
        } 
        fclose($archivo);
    
        return $ListaDeUsuarios;
    }
}



?>