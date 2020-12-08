<?php
class Triangulo extends FiguraGeometrica
{
    private $_altura;
    private $_base;

    public function __construct($b,$h)
    {
        //parent::__constructor();
        $this->_altura=$h;
        $this->_base=$b;

        $this->CalcularDatos();
    }

    protected function CalcularDatos()
    {
        #asumiendo un triangulo equilatero(lados iguales)
        $this->_perimetro=$this->_base*3;
        $this->_superficie=$this->_base*($this->_altura*1.5);
    }

    public function Dibujar()
    {
        $puntos = 1;
        $triangulo = "<font color=\"" . $this->_color . "\">";
        for ($i=0; $i < $this->_altura; $i++)
        {
            if ($puntos <= $this->_base)
            {
                for ($k=$this->_altura - $i; $k > 0; $k--)
                {
                    $triangulo .= "&nbsp;";
                }
                for ($j=0; $j < $puntos; $j++)
                {
                    $triangulo .= "*";
                }
                $puntos += 2;
            }
            $triangulo .= "<br/>";
        }
        $triangulo .= "</font>";
        echo $triangulo;
    }

    public function ToString()
    {
        return parent::ToString()."<br/>Base:".$this->_base."<br/>Altura:".$this->_altura;
    }
}
