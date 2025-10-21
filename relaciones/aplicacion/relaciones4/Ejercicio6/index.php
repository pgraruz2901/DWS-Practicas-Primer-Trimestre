<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");

//barra ubicacion
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion4",
        "LINK" => "/aplicacion/relaciones4"
    ],
    [
        "TEXTO" => "Ejercicio6",
        "LINK" => "/aplicacion/relaciones4/Ejercicio6/index.php"
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
    global $persona;
    echo $persona->__toString();
}
