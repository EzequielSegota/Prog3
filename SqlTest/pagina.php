<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="pagina.php" method="post">
        <input type="text" name="opcion" id="opcion" placeholder="Opcion">
        <input type="password" name="clave" id="clave" placeholder="Clave">
        <input type="text" name="correo" id="correo" placeholder="Mail">
        <input type="submit">
        
    </form>
</body>
</html>


<?php

$queHago = isset($_POST['opcion']) ? $_POST['opcion'] : NULL;

$host = "localhost";
$user = "root";
$pass = "";
$base = "usuario_test";

switch($queHago){
    
    case "login":
        
        $con = @mysqli_connect($host, $user, $pass, $base);
        
        $clave=$_POST["clave"];
        $correo=$_POST["correo"];

        

        $sql = "SELECT usuarios.id, usuarios.correo, usuarios.clave, usuarios.nombre, usuarios.perfil,perfiles.descripcion FROM `usuarios` AS usuarios INNER JOIN perfiles on perfiles.id=usuarios.perfil WHERE correo='$correo'and clave='$clave'";

        $rs = $con->query($sql);

        $row = $rs->fetch_object(); //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
             
        if($row!=NULL)
        {
            echo " Nombre:".$row->nombre." Correo:".$row->correo." Descripcion:".$row->descripcion;
        }
        else
            echo "Usuario no encontrado<br/>";

        mysqli_close($con);

    break;
    
    case "mostrar":

        $con = @mysqli_connect($host, $user, $pass, $base);
        
        $sql = "SELECT usuarios.id, usuarios.correo, usuarios.clave, usuarios.nombre, usuarios.perfil,perfiles.descripcion FROM `usuarios` AS usuarios INNER JOIN perfiles on perfiles.id=usuarios.perfil";

        $rs = $con->query($sql);

        while ($row = $rs->fetch_object()){ //fetch_all / fetch_assoc / fetch_array([MYSQLI_NUM | MYSQLI_ASSOC | MYSQLI_BOTH])
            $user_arr[] = $row;
        }        
      
        echo "<pre>";
        
        for ($i=0; $i < count($user_arr); $i++) { 
            echo "ID:".$user_arr[$i]->id." Correo:".$user_arr[$i]->correo." Clave:".$user_arr[$i]->clave." Nombre:".$user_arr[$i]->nombre." ID Perfil:".$user_arr[$i]->perfil." Descripcion:".$user_arr[$i]->descripcion."<br/>";
        }
            
        echo "</pre>";

        mysqli_close($con);
        
    break;

    default:
        echo ":(";

}