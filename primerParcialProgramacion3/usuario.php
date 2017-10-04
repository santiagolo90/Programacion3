<?php

class usuario 
{
    public $_nombre;
    public $_email;
    public $_perfil;
    public $_edad;
    public $_clave;


    public function __construct($nombre,$email,$perfil,$edad,$clave)
    {
        $this->_nombre = $nombre;
        $this->_email = $email;
        $this->_perfil = $perfil;
        $this->_edad = $edad;
        $this->_clave = $clave;
    }

    public function tostring()
    {
        return $this->_nombre."-".$this->_email."-".$this->_perfil."-".$this->_edad."-".$this->_clave;
    }

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
}

?>