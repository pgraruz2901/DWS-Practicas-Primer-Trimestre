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
        "TEXTO" => "Ejercicio5",
        "LINK" => "/aplicacion/relaciones4/Ejercicio5/index.php"
    ]
];
$estados = EstadoCivil::casos();
$estadoRamdom = $estados[array_rand($estados)];
$estadoAleatorio = EstadoCivil::from($estadoRamdom);
$persona = Persona::registrarPersona("pepe", "29/01/2006", "calle botica", "antequera", $estadoAleatorio);
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
