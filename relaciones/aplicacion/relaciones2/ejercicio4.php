<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//barra ubicacion
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion2",
        "LINK" => "/aplicacion/relaciones2"
    ],
    [
        "TEXTO" => "Ejercicio4",
        "LINK" => "/aplicacion/relaciones2/ejercicio4.php"
    ]
];
$valor1 = 17.5;
$valor2 =  379987.24;
inicioCabecera("Ejercicios");
cabecera();
finCabecera();

inicioCuerpo("Ejercicios", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
function cabecera() {}
function cuerpo()
{
    global $valor1, $valor2;
    echo str_pad(number_format($valor1, 1, ","), 15, 0, STR_PAD_LEFT) . "<br><br>";
    echo number_format($valor2, 2, ",", ".");
}
