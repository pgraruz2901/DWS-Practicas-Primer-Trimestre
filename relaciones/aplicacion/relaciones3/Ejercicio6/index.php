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
        "TEXTO" => "Ejercicio6",
        "LINK" => "/aplicacion/relaciones6/Ejercicio6/index.php"
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
    echo "<br>Ejemplo1<br>";
    $ejemplo1 = llamadaAFuncion(1, 2, fn($a, $b) => $a + $b);
    echo $ejemplo1;

    echo "<br>Ejemplo2<br>";
    $ejemplo2 = llamadaAFuncion(3, 4, fn($a, $b) => $a * $b);
    echo $ejemplo2;

    echo "<br>Ejemplo3<br>";
    $ejemplo3 = llamadaAFuncion(5, 6, fn($a, $b) => $a - $b);
    echo $ejemplo3;

    //  Repetir las llamadas, definiendo las 3 funciones como anónimas (se asignan a variables)
    $suma = fn($a, $b) => $a + $b;
    $resta = fn($a, $b) => $a - $b;
    $multiplicacion = fn($a, $b) => $a * $b;
    echo "<br>Con funciones anonimas<br>";
    $ejemplo1 = llamadaAFuncion(1, 2, $suma);
    echo $ejemplo1;
    echo "<br>";
    $ejemplo2 = llamadaAFuncion(3, 4, $multiplicacion);
    echo $ejemplo2;
    echo "<br>";
    $ejemplo3 = llamadaAFuncion(5, 6, $resta);
    echo $ejemplo3;
}
