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
    $vector = array("uno", "grande", "caminos", "a");
    $ordenado = ordenar($vector);
    echo "<br>Array ordenado:<br>";
    foreach ($ordenado as $clave) {
        echo $clave . "<br>";
    }
}
