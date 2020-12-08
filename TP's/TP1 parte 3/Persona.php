<?php
abstract class Persona
{
    private $_apellido;
    private $_nombre;
    private $_sexo;
    private $_dni;

    public function GetDNI()
    {
        return $this->_dni;
    }

    public function GetNombre()
    {
        return $this->_nombre;
    }

    public function GetSexo()
    {
        return $this->_sexo;
    }

    public function GetApellido()
    {
        return $this->_apellido;
    }

    function __construct($nombre,$apellido,$dni,$sexo)
    {
        $this->_apellido=$apellido;
        $this->_nombre=$nombre;
        $this->_sexo=$sexo;
        $this->_dni=$dni;
    }

    public abstract function Hablar($idioma);

    public function ToString()
    {
        $nombre=$this->GetNombre();
        $apellido=$this->GetApellido();
        $sexo=$this->GetSexo();
        $dni=$this->GetDNI();
        return $nombre." - ".$apellido." - ".$dni." - ".$sexo;
    }
}