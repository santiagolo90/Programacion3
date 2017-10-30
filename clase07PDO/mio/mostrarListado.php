<?php

include_once ("listar.php");
include_once ("cd.php");

$arraysDeCd =Listar::TraerTodoLosCds();

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
    <h2>Lista de PDO</h2>
    <thead>
        <tr>
        
            <th> Cantante</th>
            <th> titulo</th>
            <th> año</th>
        </tr>

    </thead>
    <tbody>
    ";

foreach ($arraysDeCd as $cd) {
echo "<tr>
    <td>$cd->cantante</td>
    <td>$cd->titulo</td>
    <td>$cd->año</td>
    </tr>";
}
echo" </table>"; 


?>