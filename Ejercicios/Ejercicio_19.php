<?php
require_once "Clases Ejercicio_19/FiguraGeometrica.php";
require_once "Clases Ejercicio_19/Rectangulo.php";
require_once "Clases Ejercicio_19/Triangulo.php";

$rectangulo01 = new Rectangulo(3,3);
$rectangulo01->setColor("rojo");
echo $rectangulo01->ToString()."<br/>";

$triangulo01 = new Triangulo(5,5);
echo $triangulo01->ToString();

