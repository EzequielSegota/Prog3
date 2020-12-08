<?php
    require("Persona.php");
    require("Empleado.php");
    require("Fabrica.php");
    $ar=fopen("archivos/empleados.txt","r");

    while(!feof($ar))
    {
        $contenido=fgets($ar);
        if($contenido!="\n"&&$contenido!="")
        {
            $array_Linea=explode(" - ",$contenido);

                /*$empleado=new Empleado($nombre,$apellido,$dni,$sexo,$legajo,$sueldo,$turno);
                    orden del constructor para saber el orden en que se guarda
                */
            
            $nombreAux=$array_Linea[0];
            $apellidoAux=$array_Linea[1];
            $dniAux=$array_Linea[2];
            $sexoAux=$array_Linea[3];
            $legajoAux=$array_Linea[4];
            $sueldoAux=$array_Linea[5];
            $turnoAux=$array_Linea[6];
        
                //var_dump($array_Linea);
        
            $empleadoAux=new Empleado($nombreAux,$apellidoAux,$dniAux,$sexoAux,$legajoAux,$sueldoAux,$turnoAux);
            
            

            echo $empleadoAux->ToString();
            ?>
            <a href="mostrar.php?legajo=<?php echo $legajoAux; ?>">Eliminar</a>
            <?php
            echo "<br/>";
        }
        
    }
    fclose($ar);

    if(isset($_GET["legajo"]))
    {
                $getLegajo=$_GET["legajo"];
                $ar=fopen("archivos/empleados.txt","r");
                $bool=false;
                while(!feof($ar))
                {
                    $contenido=fgets($ar);
                    if($contenido!="\n"&&$contenido!="")
                    {
                        $array_Linea=explode(" - ",$contenido);

                            /*$empleado=new Empleado($nombre,$apellido,$dni,$sexo,$legajo,$sueldo,$turno);
                                orden del constructor para saber el orden en que se guarda
                            */
                        
                        $nombreAux=$array_Linea[0];
                        $apellidoAux=$array_Linea[1];
                        $dniAux=$array_Linea[2];
                        $sexoAux=$array_Linea[3];
                        $legajoAux=$array_Linea[4];
                        $sueldoAux=$array_Linea[5];
                        $turnoAux=$array_Linea[6];
                    
                            //var_dump($array_Linea);
                            
                        //$empleadoAux=new Empleado($nombreAux,$apellidoAux,$dniAux,$sexoAux,$legajoAux,$sueldoAux,$turnoAux);
                        
                        if($getLegajo==$legajoAux)
                        {
                            $bool=true;
                            $empleadoAux=new Empleado($nombreAux,$apellidoAux,$dniAux,$sexoAux,$legajoAux,$sueldoAux,$turnoAux);
                            $fabricaAux=new Fabrica("Test",7);
                            $fabricaAux->TraerDeArchivo("archivos/empleados.txt");
                            if($fabricaAux->EliminarEmpleado($empleadoAux))
                            {
                                echo "Empleado Eliminado<br/>";
                                
                                $fabricaAux->GuardarEnArchivo("archivos/empleados.txt");
                                continue;
                            }
                            else
                            {
                                echo "No pudo eliminarse el empleado :c<br/>";
                            }
                        }
                        

                        
                    }
                    
                }
                if(!$bool)
                {echo "No se encontro un empleado con ese legajo!<br/>";
                    ?><a href="mostrar.php">Mostrar?<br/></a><?php
                                ?><a href="index.html">Nada que ver aqui<br/></a><?php    
                }
                fclose($ar);
               
                
            }
    
?>