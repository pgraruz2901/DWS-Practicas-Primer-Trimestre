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
        "TEXTO" => "Ejercicio4",
        "LINK" => "/aplicacion/relaciones4/Ejercicio4/index.php"
    ]
];
$flauta = Flauta::CrearDesdeArray(["Esto es una flauta", "material" => "Madera", "edad" => 5]);
inicioCabecera("Ejercicios");
cabecera();
finCabecera();
inicioCuerpo("Ejercicios", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
function cabecera() {}
function cuerpo()
{
    global $flauta;
    echo $flauta->__toString();
}
