<?php
//retorna una tabla de producto con la imagen correspondiente de cada producto


$archivo = fopen("productos.txt", "r");
$listado = explode("\n", fread($archivo, filesize("productos.txt")));
//echo "<br>".var_dump($listado);

//Error Notice: Undefined offset: 2 borro el ultimo campo en blanco del array por el \n
array_pop($listado);
//echo "<br>".var_dump($listado);
//echo "<br>".count($listado);


echo"
<style>

		table {
            //border-radius: 10px 10px 10px 10px;
            border: 2px solid #000000;
            border-collapse: collapse;
            width: 1000px;
            
		}

		th, td {
            text-align: left;
            border: 2px solid black;
		}

		tr:nth-child(even) {
            background-color: #D3D1A4;
        }
         
        tr:nth-child(odd) {
            background-color: #fff;
        }

		th {
		    background-color: #0C22C2;
		    color: #E6DC0A;
        }
        td {
		    border 1px;
		}

    </style> 
    
<table>
    <h2>Lista de productos</h2>
    <thead>
        <tr>
        
            <th> Nombre</th>
            <th> Precio</th>
            <th> Foto</th>
        </tr>

    </thead>
    <tbody>
    ";


foreach ($listado as $key) {
    list($n, $p, $i) = explode("-", $key);
    echo"
    <tr>
        <td> $n </td>
        <td> $p</td>
        <td> <image src='".$i."'></image></td>
    </tr>";
}
echo "</tbody>
      </table>";
      
fclose($archivo);


/*
    do {

    if ($datos = fgets($archivo)) {
        list($n, $p, $i) = explode("-", $datos);
        echo"
        <tbody>
        <tr>
            <td> $n </td>
            <td> $p</td>
            <td> <image src='".$i."'></image></td>
        </tr>

        </tbody>
        </table>"
        ;
    }
} while (!feof($archivo));
*/
