<?php
abstract class FiguraGeometrica
{
    protected $_color;
    protected $_perimetro;
    protected $_superficie;
    
    public function getColor()
    {
        return $this->_color;
    }
    
    public function setColor($unColor)
    {
        $this->_color=$unColor;
    }

    public function __construct()
    {
        $this->setColor("rojo");
    }

    public abstract function Dibujar();
    
    protected abstract function CalcularDatos();

    public function ToString()
    {
        echo "<br/>Color:",$this->_color;
        echo "<br/>Perimetro:",$this->_perimetro;
        echo "<br/>Superficie:",$this->_superficie;

        echo "<br/>";

        $this->Dibujar();
    }
}