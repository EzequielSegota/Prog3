<?php
$op1=15;
$op2=0;
$operador='/';
$resultado=0;


if($operador=='+')
    $resultado=$op1+$op2;
if($operador=='-')
    $resultado=$op1-$op2;
if($operador=='*')
    $resultado=$op1*$op2;
if($operador=='/' && $op2!=0)
    $resultado=$op1-$op2;

echo "Resultado:",$resultado;
