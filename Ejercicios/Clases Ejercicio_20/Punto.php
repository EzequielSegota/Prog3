<?php
class Punto
{
    private int $_x;
    private int $_y;

    function GetX()
    {
        return $this->_x;
    }

    function GetY()
    {
        return $this->_y;
    }

    function __construct(int $x,int $y)
    {
        $this->_x=$x;
        $this->_y=$y;
    }
}