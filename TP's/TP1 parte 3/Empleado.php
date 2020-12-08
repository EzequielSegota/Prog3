<?php
class Empleado extends Persona
{
    protected $_legajo;
    protected $_sueldo;
    protected $_turno;

    public function GetLegajo()
    {
        return $this->_legajo;
    }
    public function GetSueldo()
    {
        return $this->_sueldo;
    }
    public function GetTurno()
    {
        return $this->_turno;
    }

    function __construct($nombre,$apellido,$dni,$sexo,$legajo,$sueldo,$turno)
    {
        parent::__construct($nombre,$apellido,$dni,$sexo);
        $this->_legajo=$legajo;
        $this->_sueldo=$sueldo;
        $this->_turno=$turno;
    }

    public function Hablar($idioma)
    {
        $aux="El empleado habla:";
        for($i=0;$i<count($idioma);$i++)
        {
            $aux .= $idioma[$i];
        }
        return $aux;
    }

    public function ToString()
    {
        $legajo=$this->GetLegajo();
        $sueldo=$this->GetSueldo();
        $turno=$this->GetTurno();
        $cadena=parent::ToString();
        $cadena.=" - ".$legajo." - ".$sueldo." - ".$turno;
        return $cadena;
    }
}