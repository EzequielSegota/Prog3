<?php
require_once "Empleado.php";
require_once "interfaces.php";
class Fabrica implements IArchivo
{
    private int $_cantidadMaxima;
    private $_empleados;
    private string $_razonSocial;

    public function __construct(string $razonSocial,int $cantMax=5)
    {
        $this->_razonSocial=$razonSocial;
        $this->_cantidadMaxima=$cantMax;
        $this->_empleados=array();
    }

    public function AgregarEmpleado(Empleado $empleado)
    {
        if(count($this->_empleados)<$this->_cantidadMaxima)
        {
            array_push($this->_empleados,$empleado);
            $this->EliminarEmpleadosRepetidos();
            return true;
        }
        return false;
    }

    public function CalcularSueldos()
    {
        $sueldoAPagar=0;
        for ($i=0; $i <count($this->_empleados); $i++) 
        { 
            $sueldoAPagar+=$this->_empleados[$i]->GetSueldo();
        }
        return $sueldoAPagar;
    }

    public function EliminarEmpleado(Empleado $unEmpleado)
    {
        for ($i=0; $i <count($this->_empleados); $i++) { 
            if($this->_empleados[$i]->GetLegajo()==$unEmpleado->GetLegajo())
            {
                unset($this->_empleados[$i]);
                return true;
            }
        }
        return false;
    }

    private function EliminarEmpleadosRepetidos()
    {
        $this->_empleados=array_unique($this->_empleados,SORT_REGULAR);
    }

    public function ToString()
    {
        $cantMax=$this->_cantidadMaxima;
        $razonSocial=$this->_razonSocial;
        $cadena = "Cantidad máxima de empleados:".$cantMax." - Razón Social:".$razonSocial." - <br/>Empleados:<br/>\n";
        for ($i=0; $i < count($this->_empleados); $i++) { 
            $cadena.=$this->_empleados[$i]->ToString();
        }

        return $cadena;
    }

    function GuardarEnArchivo(string $nombreDelArchivo)
    {
        //ABRO EL ARCHIVO
		$ar = fopen($nombreDelArchivo, "w");
		
		//ESCRIBO EN EL ARCHIVO
		for ($i=0; $i < count($this->_empleados); $i++) { 
            fwrite($ar,$this->_empleados[$i]->ToString()."\n");
        }
	
		//CIERRO EL ARCHIVO
		fclose($ar);
    }
    function TraerDeArchivo(string $nombreDelArchivo)
    {
        $ar=fopen($nombreDelArchivo,"r");
        
        while(!feof($ar))
        {
            $contenido=fgets($ar);
            if($contenido!=""&&$contenido!="\n")
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
        
                $this->AgregarEmpleado($empleadoAux);
            }
            
        }

        fclose($ar);
    }
}
