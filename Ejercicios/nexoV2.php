<?php

if(isset($_REQUEST["accion"]))
{
    $nombre=$_POST["nombre"];
    $legajo=$_POST["legajo"];
    $apellido=$_POST["apellido"];

    $destino = "archivos/" . $_FILES["archivo"]["name"];

    switch ($_REQUEST["accion"]) {
        case 'alta':
            $ar=fopen("archivos/alumnos.txt","a");
            $datosAGuardar=$legajo. " - ". $apellido. " - " .$nombre ." - " .$destino ."\n";
            move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);
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
                {
                    echo $cadena;
                    session_start();
                    $_SESSION["legajo"]=$legajo;
                    $_SESSION["nombre"]=$nombre;
                    $_SESSION["apellido"]=$apellido;
                    header("location: principal.php");
                }  
                else
                    echo "<br/>No se encuentra el legajo:". $legajo;
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
