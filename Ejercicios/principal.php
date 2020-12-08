<?php
session_start();
if(isset($_SESSION["legajo"]))
{
    echo "<h1>Legajo:". $_SESSION["legajo"] ."</h1><br/>";
echo "<h2>Nombre:". $_SESSION["nombre"] ."</h2><br/>";

$ar=fopen("archivos/alumnos.txt","r");
            
echo '<table border="2">
        <tbody>
            <thead>
                <th>Legajo</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Foto</th>
            </thead>';
            while(!feof($ar))
            {
                $cadena=fgets($ar);
                $aux=explode(" - ",$cadena);
                //var_dump($cadena);
                echo "<tr>";
                
                for ($i=0; $i < 4; $i++) { 
                   // var_dump($aux);
                   echo "<td>".$aux[$i]."</td>";
                }
                echo "</tr>";
            }
            echo "
        </tbody>
    </table>";
}
else
    echo "No esta la sesión activa!";