<?php
$array=array(0,1,3,5,7,9,11,13,15,17);

echo "<br/>Con For<br/>";

for ($i=0; $i < 10; $i++) { 
    echo "Numero:",$array[$i] . " en la posicion:", $i+1 ."<br/>";
}

$i=0;

echo "<br/>Con While<br/>";

while($i<10)
{
    echo "Numero:",$array[$i] . " en la posicion:", $i+1 ."<br/>";

    $i++;
}
$i=0;
echo "<br/>Con Foreach<br/>";

foreach ($array as $key) {
    echo "Numero:",$key ."<br/>";
}