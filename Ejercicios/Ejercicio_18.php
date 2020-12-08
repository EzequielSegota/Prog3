<?php
$numeroUno=8;
$numeroDos=3;

if(EsPar($numeroUno))
    echo $numeroUno." Es Par<br/>";

if(EsImpar($numeroDos))
    echo $numeroDos." Es Impar<br/>";

function EsPar($numero)
{
    if($numero%2==0)
    {
        return true;
    }
    return false;
}

function EsImpar($numero)
{
    return !(EsPar($numero));
}