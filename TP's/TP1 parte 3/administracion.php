<?php
    require("Persona.php");
    require("Empleado.php");  
    require("Fabrica.php");

    if(isset($_POST["txtDni"]))
    {
        $dni=$_POST["txtDni"];
        $apellido=$_POST["apellido"];
        $nombre=$_POST["nombre"];
        $sexo=$_POST["cboSexo"];
        $legajo=$_POST["txtLegajo"];
        $sueldo=$_POST["txtSueldo"];
        $turno=$_POST["rdoTurno"];

        $empleado=new Empleado($nombre,$apellido,$dni,$sexo,$legajo,$sueldo,$turno);

        $fabrica=new Fabrica("Test",7);

        if(file_exists("archivos/empleados.txt"))
            $fabrica->TraerDeArchivo("archivos/empleados.txt");

        if($fabrica->AgregarEmpleado($empleado))
        {
            $fabrica->GuardarEnArchivo("archivos/empleados.txt");
            ?><a href="mostrar.php">Mostrar?</a><?php
        }
        else
        {
            ?><a href="index.html">Nada que ver aqui</a><?php
        }

        
    }
?>