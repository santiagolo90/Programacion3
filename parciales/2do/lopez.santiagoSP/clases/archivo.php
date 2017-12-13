<?php 

class Archivo {

        public static function moveUploadedFile($uploadedFile, $nombre)
        {
            $nombre = str_replace(" ", "_", $nombre);
            $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
            $filename = trim($nombre) .'.'. $extension;

            $foto = 'fotos/' . $filename;
            $uploadedFile->moveTo($foto);
        
            return $foto;
        }

        public static function moverFotoABackup($fotoVieja, $nombre)
        {
            $ahora = date("Ymd-His");
            $extension = pathinfo($fotoVieja, PATHINFO_EXTENSION);
            rename($fotoVieja , "./papelera/".trim($nombre)."-".$ahora.".".$extension);
        }
    }
 
?>