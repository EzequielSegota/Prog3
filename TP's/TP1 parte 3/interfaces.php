<?php
interface IArchivo{
    function GuardarEnArchivo(string $nombreDelArchivo);
    function TraerDeArchivo(string $nombreDelArchivo);
}