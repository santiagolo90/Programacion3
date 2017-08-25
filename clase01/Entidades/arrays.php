<?php

$MiArray = [1,"Lunes","dos","Sabado",5];

    foreach ($MiArray as $Dato) 
    {
    //echo"<BR>$Dato";
    echo'<BR>$Dato';
    }

array_push($MiArray,"Santiago");
array_push($MiArray,$MiArray);

//var_dump($MiArray);
?>