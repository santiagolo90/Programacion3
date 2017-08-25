<?php

$num1=rand(2,6);
$num2=rand(0,9);
$num=$num1.$num2;
echo "$num<BR>";

switch ($num1) {
    case '2':
        echo "veinte";
        break;
    
    case '3':
        echo "treinta";
        break;
    
    case '4':
        echo "cuarenta";
        break;
    
    case '5':
        echo "cincuenta";
        break;
    
    case '6':
        echo "sesenta";
        break;

}

switch ($num2) {
    case '1':
        echo " y uno";
        break;
    
    case '2':
        echo " y dos";
        break;
    
    case '3':
        echo " y tres";
        break;
    
    case '4':
        echo " y cuatro";
        break;
    
    case '5':
        echo " y cinco";
        break;

    case '6':
        echo " y seis";
        break;
    
    case '7':
        echo " y siete";
        break;
    
    case '8':
        echo " y ocho";
        break;
    
    case '9':
        echo " y nueve";
        break;

}

?>