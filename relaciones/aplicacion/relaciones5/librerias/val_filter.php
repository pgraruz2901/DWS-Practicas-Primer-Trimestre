<?php

namespace VALFILTER;

use \DateTime;

function validaEntero(int &$var, int $min, int $max, int $defecto): bool
{
    $resultado = false;
    if (filter_var($var, FILTER_VALIDATE_INT) && $var < $max && $var > $min) {
        $resultado = true;
    } else {
        $var = $defecto;
    }
    return $resultado;
}
function validaReal(float &$var, float $min, float $max, float $defecto): bool
{
    $resultado = false;
    if (filter_var($var, FILTER_VALIDATE_FLOAT) && $var < $max && $var > $min) {
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
    $fecha->format(" d/m/Y");

    $formato = "d/m/Y";
    $validacion = DateTime::createFromFormat($formato, $var);
    if (!$validacion && !$fecha) {
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
    $hora->format(" H:i:s");

    $formato = "h:i:s";
    $validacion = DateTime::createFromFormat($formato, $var);
    if (!$validacion && !$hora) {
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
    $expresion = "/^[\w.-]+@[\w.-]\.[a-zA-Z]{2,}$/";
    if (filter_var($var, FILTER_VALIDATE_EMAIL) && preg_match($expresion, $var)) {
        return $resultado = true;
    } else {
        $var = $defecto;
        return $resultado;
    }
}
function validaCadena(string &$var, int $longitud, string $defecto): bool
{
    $resultado = false;
    if (is_string($var) && strlen($var) > $longitud) {
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
    return $resultado = false;

    if ($tipo == 1) {
        foreach ($posibles as $valor) {
            if ($var = $valor) {
                $resultado = true;
            }
        }
    } else if ($tipo == 2) {
        foreach ($posibles as $valor => $key) {
            if ($var = $key) {
                $resultado = true;
            }
        }
    }
    return $resultado;
}
