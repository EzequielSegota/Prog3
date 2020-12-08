<?php
$numerosArray=array(rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9));

for ($i=0; $i < 5; $i++) { 
    if($numerosArray[$i]>6)
        echo "El numero:", $numerosArray[$i] . " en ",$i+1 ." es mayor a 6 <br/>";
    else if($numerosArray[$i]<6)
        echo "El numero:", $numerosArray[$i] ." en ",$i+1 . " es menor a 6 <br/>";
    else
        echo "El numero:", $numerosArray[$i] ." en ",$i+1 . " es igual a 6 <br/>";

}