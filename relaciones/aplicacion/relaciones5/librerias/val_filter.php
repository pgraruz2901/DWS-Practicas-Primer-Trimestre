<?php
function validaEntero(int &$var, int $min, int $max, int $defecto): bool
{
    $resultado = false;
    if ($var < $max && $var > $min) {
        $resultado = true;
    } else {
        $var = $defecto;
    }
    return $resultado;
}
function validaReal(float &$var, float $min, float $max, float $defecto): bool
{
    $resultado = false;
    if ($var < $max && $var > $min) {
        $resultado = true;
    } else {
        $var = $defecto;
    }
    return $resultado;
}
function validaFecha(string &$var, string $defecto): bool
{
    $resultado = false;
    $fecha =  new DateTime($var);
    $fecha->format(" dd/mm/aaaa");
    if (!$fecha) {
        $var = $defecto;
        return $resultado;
    } else {
        $var = $fecha;
        return $resultado = true;
    }
}
function validaHora(string &$var, string $defecto): bool
{
    $resultado = false;
    $hora =  new DateTime($var);
    $hora->format(" hh:mm:ss");
    if (!$hora) {
        $var = $defecto;
        return $resultado;
    } else {
        $var = $hora;
        return $resultado = true;
    }
}
function validaEmail(string &$var, string $defecto): bool
{
    $resultado = false;
    $antesArroba = substr($var, 0, strpos($var, "@"));
    $despuesArroba = substr($var, strpos($var, "@") + 1);
    $despuesPunto = substr($var, strpos($var, ".") + 1);
    if (!(strlen($antesArroba) > 0 && strlen($despuesArroba) && strlen($despuesPunto) > 0)) {
        $var = $defecto;
        return $resultado;
    } else {
        return $resultado = true;
    }
}
function validaCadena(string &$var, int $longitud, string $defecto): bool
{
    $resultado = false;
    if (strlen($var) > $longitud) {
        $var = $defecto;
        return $resultado;
    } else {
        return $resultado = true;
    }
}
function validaExpresion(string &$var, string $expresion, string $defecto): bool
{
    $resultado = false;
    if (preg_match($expresion, $var)) {
        return $resultado = true;
    } else {
        $var = $defecto;
        return $resultado;
    }
}
function validaRango(mixed $var, array $posibles, int $tipo = 1): bool
{
    $resultado = false;
}
