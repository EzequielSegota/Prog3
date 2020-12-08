<?php
require_once "Persona.php";
require_once "Empleado.php";
require_once "Fabrica.php";
$empleado=new Empleado("Pepito","Perez",123456,'M',654,123.2,"Tarde");

$empleadoDos=new Empleado("Maria","Rosa",1256,'F',6549,1235.2,"Mañana");

echo "ToString:".$empleado->ToString();

$idiomas=array("Español,","Ingles,","Frances");
echo "Idiomas:".$empleado->Hablar($idiomas)."<br/>";

echo "Sexo con Get:".$empleado->GetSexo()."<br/>";

$fabrica=new Fabrica("porque sí");

$fabrica->AgregarEmpleado($empleado);
$fabrica->AgregarEmpleado($empleadoDos);
$fabrica->AgregarEmpleado($empleado);//No entra

//$fabrica->EliminarEmpleado($empleadoDos);//Elimino

echo "Sueldos(deberia ser 1358.4):".$fabrica->CalcularSueldos()."<br/>";

echo "Info fabrica:<br/>".$fabrica->ToString();

