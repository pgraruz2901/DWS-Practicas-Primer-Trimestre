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
        "TEXTO" => "Ejercicio2",
        "LINK" => "/aplicacion/relaciones3/Ejercicio2/index.php"
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
    echo"<br>";
    $cadena = generarCadena(7);
    echo $cadena;
}
