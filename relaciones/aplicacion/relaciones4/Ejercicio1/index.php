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
        "TEXTO" => "Ejercicio1",
        "LINK" => "/aplicacion/relaciones4/Ejercicio1/index.php"
    ]
];
$saxofon = new instrumentoBase("Esto es un saxofon", 2);
$saxofon2 = new instrumentoBase("Esto es un saxofon", 2);
$saxofon3 = new instrumentoBase("Esto es un saxofon", 2);
$saxofon4 = new instrumentoBase("Esto es un saxofon", 2);
$saxofon5 = new instrumentoBase("Esto es un saxofon", 2);
inicioCabecera("Ejercicios");
cabecera();
finCabecera();
inicioCuerpo("Ejercicios", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
function cabecera() {}
function cuerpo()
{
    //global $saxofon, $saxofon3;
    //echo "<br>" . $saxofon->__toString();
    //echo "<br>" . $saxofon3->__toString();
}
