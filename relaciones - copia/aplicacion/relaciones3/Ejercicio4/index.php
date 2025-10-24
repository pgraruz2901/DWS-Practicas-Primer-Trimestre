<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
include_once(dirname(__FILE__) . "/../libreria.php");
//barra ubicacion
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion3",
        "LINK" => "/aplicacion/relaciones3"
    ],
    [
        "TEXTO" => "Ejercicio4",
        "LINK" => "/aplicacion/relaciones4/Ejercicio4/index.php"
    ]
];
inicioCabecera("Ejercicios");
cabecera();
finCabecera();

inicioCuerpo("Ejercicios", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
function cabecera() {}
function cuerpo()
{
    echo "Ejemplo";
    $valor = 7;
    $ejemplo = devuelve($valor, 4);
    echo "El resultado es " . $ejemplo;
    echo "<br>";
    echo "El valor es " . $valor;
    echo "<br>";

    echo "<br>- Los tres parámetros <br>";
    $valor = 7;
    $prueba1 = devuelve($valor, 7, 7);
    echo "El resultado es " . $prueba1;
    echo "<br>";
    echo "El valor es " . $valor;
    echo "<br>";

    echo "<br>- El primer parámetro únicamente <br>";
    $valor = 9;
    $prueba2 = devuelve($valor);
    echo "El resultado es " . $prueba2;
    echo "<br>";
    echo "El valor es " . $valor;
    echo "<br>";

    echo "<br>- El primer y el segundo parámetro <br>";
    $valor = 9;
    $prueba3 = devuelve($valor, 4);
    echo "El resultado es " . $prueba3;
    echo "<br>";
    echo "El valor es " . $valor;
    echo "<br>";

    echo "<br>- El primer y el tercer parámetro (ojo, el segundo parámetro no se indica) <br>";
    $valor = 9;
    $prueba4 = devuelve(int1: $valor, int3: 4);
    echo "El resultado es " . $prueba4;
    echo "<br>";
    echo "El valor es " . $valor;
}
