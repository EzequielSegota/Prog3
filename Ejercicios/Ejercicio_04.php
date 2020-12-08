<?php
$numero=1;
for ($i=1; $i < 1001; $i++) { 
    echo "<br/>Mi numero actual:",$numero;
    echo "<br/>Numero a sumar:",$i+1;
    echo "<br/>";
    $numero=$numero+$i+1;
    if($numero==1000 || $numero > 1000)
        break;
}