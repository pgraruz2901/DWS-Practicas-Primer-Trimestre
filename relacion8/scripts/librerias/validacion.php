<?php
// namespace VALFILTER;

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
    $fechaParts = explode('/', $var);
    if (count($fechaParts) === 3) {
        $dia = str_pad($fechaParts[0], 2, '0', STR_PAD_LEFT);
        $mes = str_pad($fechaParts[1], 2, '0', STR_PAD_LEFT);
        $anio = $fechaParts[2];
        $var = "$dia/$mes/$anio";
    }

    $date = date_create_from_format('d/m/Y', $var);

    if (!$date || $date->format('d/m/Y') !== $var) {
        $var = $defecto;
        return false;
    }

    return true;
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
    $resultado = false;

    if ($tipo == 1) {
        foreach ($posibles as $valor) {
            if ($var == $valor) {
                $resultado = true;
                break;
            }
        }
    } else if ($tipo == 2) {
        foreach ($posibles as $clave => $valor) {
            if ($var == $clave) {
                $resultado = true;
                break;
            }
        }
    }

    return $resultado;
}
