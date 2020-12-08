<?php
require_once "Empleado.php";
class Fabrica
{
    private int $_cantidadMaxima;
    private $_empleados;
    private string $_razonSocial;

    public function __construct(string $razonSocial)
    {
        $this->_razonSocial=$razonSocial;
        $this->_cantidadMaxima=5;
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
        $cadena = "Cantidad máxima de empleados:".$cantMax." - Razón Social:".$razonSocial."<br/>Empleados:<br/>";
        for ($i=0; $i < count($this->_empleados); $i++) { 
            $cadena.=$this->_empleados[$i]->ToString();
        }

        return $cadena;
    }
}
