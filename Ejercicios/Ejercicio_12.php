<?php
$lapiceraUno=array(
    "color" => "negro",
    "trazo" => "fino",
    "marca" => "pirulin",
    "precio" => 15.55
);

$lapiceraDos=array(
    "color" => "Blanco",
    "trazo" => "fino",
    "marca" => "pirulon",
    "precio" => 12.1
);

$lapiceraTres=array(
    "color" => "Azul",
    "trazo" => "Grueso",
    "marca" => "prulin",
    "precio" => 1
);

foreach ($lapiceraUno as $key => $value) {
    echo "<br/>",$key ." => ",$value;
}
echo "<br/>";
foreach ($lapiceraDos as $key => $value) {
    echo "<br/>",$key ." => ",$value;
}
echo "<br/>";
foreach ($lapiceraTres as $key => $value) {
    echo "<br/>",$key ." => ",$value;
}