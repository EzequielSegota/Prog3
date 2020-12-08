<?php
/*
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.
*/
$arrayAnimales=array("Perro", "Gato", "Ratón", "Araña", "Mosca");
$arrayAños=array(1986, 1996, 2015, 78, 86);
$arrayLenguajes=array("php", "mysql", "html5", "typescript", "ajax");


$arrayAsociativo=array(
    "Animales" =>$arrayAnimales,
    "Años" =>$arrayAños,
    "Lenguajes" =>$arrayLenguajes,
);

$arrayIndexado=array(
    0 =>$arrayAnimales,
    1 =>$arrayAños,
    2 =>$arrayLenguajes,
);

foreach ($arrayAsociativo as $key => $value) {
    echo "<br/>",$key."<br/>";
    foreach ($value as $v) {
        echo $v."<br/>";
    }
}

foreach ($arrayAsociativo as $value) {
    echo "<br/>";
    foreach ($value as $key) {
        echo $key."<br/>";
    }
}