<?php

if(isset($_POST["accion"]))
{
    //$nombre=$_POST["nombre"];
    $legajo=$_POST["legajo"];
    //$apellido=$_POST["apellido"];

    switch ($_POST["accion"]) {
        case 'alta':
            $ar=fopen("archivos/alumnos.txt","a");
            $datosAGuardar=$legajo. " - ". $apellido. " - " .$nombre ."\n";
            fwrite($ar,$datosAGuardar);
            fclose($ar);
            echo "Archivo escrito exitosamente";
            break;
        case 'listado':
            $ar=fopen("archivos/alumnos.txt","r");
            while(!feof($ar))
            {
                echo fgets($ar)."<br/>";
            }
            break;
        case 'verificar':
            $ar=fopen("archivos/alumnos.txt","r");
            while(!feof($ar))
            {
                $cadena=fgets($ar);
                $arrayLinea=explode(" - ",$cadena);
                if($arrayLinea!=false && $arrayLinea[0] == $legajo)
                    echo $cadena;
            }
            break;
        default:
            echo "Puede fallar diria Tusan";
            break;
    }
}
else
{
    echo "no esta seteado";
}
