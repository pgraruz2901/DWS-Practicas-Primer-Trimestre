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
        "TEXTO" => "Ejercicio5",
        "LINK" => "/aplicacion/relaciones5/Ejercicio5/index.php"
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
    echo "Resta<br>";
    $resta = hacerOperacion("resta", 3, 1);
    echo $resta;
    echo "<br>";

    echo "Suma<br>";
    $suma = hacerOperacion("suma", 3, 3);
    echo $suma;
    echo "<br>";

    echo "Multiplicacion<br>";
    $multiplicacion = hacerOperacion("multiplicacion", 2, 2);
    echo $multiplicacion;
    echo "<br>";
}
