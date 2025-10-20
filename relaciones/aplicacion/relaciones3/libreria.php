<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//barra ubicacion
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Libreria",
        "LINK" => "/aplicacion/relaciones3"
    ]
];
/**
 * @param array
 * @param string
 * @param int
 * @param int
 * @return bool
 */
function cuentaVeces(array &$array, string $string, int $int1, int &$int2): bool
{
    if ($string == "2daw" || $string == "primera") {
        return false;
    } else {
        $array[$string] = $int1;
        $int2++;
        return true;
    }
}

function generarCadena(int $longitud = 10): string
{
    if ($longitud <= 0) {
        return false;
    } else {
        $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $cadena = "";
        for ($i = 0; $i < $longitud; $i++) {
            $cadena .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $cadena;
    }
}

function operaciones(int $num1, ...$operandos)
{
    switch ($num1) {
        case 1:
            $suma = 0;
            foreach ($operandos as $valor) {
                $suma += $valor;
            }
            return $suma;
        case 2:
            $primerOperando = $operandos[0];
            for ($i = 1; $i <= count($operandos); $i++) {
                $primerOperando -= $operandos[$i];
            }
            return $primerOperando;
        case 3:
            $multiplicacion = 0;
            foreach ($operandos as $clave) {
                $multiplicacion *= $clave;
            }
            return $multiplicacion;
        default:
            $resultado = 0;
            foreach ($operandos as $posi => $clave) {
                if (($posi + 1) % 2 == 0) {
                    $resultado += $clave;
                } else {
                    $resultado -= $clave;
                }
            }
            return $resultado;
    }
}
function devuelve(&$int1, $int2 = 3, $int3 = 2)
{
    $valor1 = $int1;
    $int1 = $int1 + $int2 + $int3;
    return $valor1 * $int2 * $int3;
}
function suma($int1, $int2)
{
    return $int1 + $int2;
}
function resta($int1, $int2)
{
    return $int1 - $int2;
}
function multiplicacion($int1, $int2)
{
    return $int1 * $int2;
}
function hacerOperacion($cadena, $op1, $op2)
{
    switch ($cadena) {
        case "suma":
            return suma($op1, $op2);
        case "resta":
            return resta($op1, $op2);
        case "multiplicacion":
            return multiplicacion($op1, $op2);
        default:
            return false;
    }
}
function llamadaAFuncion(int $int1, int $int2, callable $callable): int
{
    return $callable($int1, $int2);
}
function ordenar(array $array): array
{
    usort($array, fn($a, $b) => strlen($b) <=> strlen($a));
    return $array;
}
