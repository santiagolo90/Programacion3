<?php

class cliente 
{
   public $nombre;
   public $mail;
   public $clave;
   public $sexo;
    
   
    public function __construct($nombre,$mail,$clave,$sexo)
    {
       $this->nombre = $nombre;
       $this->mail = $mail; 
       $this->clave = $clave;
       $this->sexo = $sexo;
    }

    public function ToString()
    {
        return $this->nombre."-".$this->mail."-".$this->clave."-".$this->sexo."\n";
    }


}


?>