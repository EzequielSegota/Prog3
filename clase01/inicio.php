<?php 
	echo "Hello World";

$nombre = "Juan";
$edad = 25;
$sueldo = 8500.33;


print("<br>" . "Nombre: $nombre");
echo "<br>"."Edad:",$edad;
printf("<br>" . "Sueldo:$sueldo" . "<br>");

$vec = array(1,2,3,4);

var_dump($vec);

for ($i=0; $i < count($vec) ; $i++) { 
	echo $vec[$i] . "<br>";
}

foreach ($vec as $item) {
	echo $item . "<br>";
}

$vec_asoc = array("uno"=>1,"dos"=>2);
$vec_asoc["tres"]=3;

foreach ($vec_asoc as $item) {
	echo $item . "<br>";
}

echo $vec_asoc["dos"];

array_push($vec,88);

foreach ($vec as $item) {
	echo "<br>" . $item ;
}

?>


<br>Test HTML<br>
