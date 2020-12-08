<?php
$arrayCaracteres=array('H','O','L','A');

$arrayCaracteres=_InvertirArray($arrayCaracteres);

for ($i=0; $i < sizeof($arrayCaracteres) ; $i++) { 
    echo $arrayCaracteres[$i];
}

function _InvertirArray($array)
{
    return array_reverse($array);
}