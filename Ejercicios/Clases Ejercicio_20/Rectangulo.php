<?php
require_once "Punto.php";
class Rectangulo
{
    private Punto $_vertice1;
    private Punto $_vertice2;
    private Punto $_vertice3;
    private Punto $_vertice4;
    public float $area;
    public float $perimetro;
    public int $ladoUno;
    public int $ladoDos;

    function __construct(Punto $v1,Punto $v3)
    {
    }
}