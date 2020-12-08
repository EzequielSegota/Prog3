<?php
$arrayAnimales=array();
$arrayAños=array();
$arrayLenguajes=array();

array_push($arrayAnimales,"Perro", "Gato", "Ratón", "Araña", "Mosca");
array_push($arrayAños,1986, 1996, 2015, 78, 86);
array_push($arrayLenguajes,"php", "mysql", "html5", "typescript", "ajax");

$arrayFinal=array_merge($arrayAnimales,$arrayAños,$arrayLenguajes);

foreach ($arrayFinal as $value) {
    echo "<br/>",$value;
}