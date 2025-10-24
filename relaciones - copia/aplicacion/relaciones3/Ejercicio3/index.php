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
        "TEXTO" => "Ejercicio3",
        "LINK" => "/aplicacion/relaciones3/Ejercicio3/index.php"
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
    $operacion1 = Operaciones(1, 2, 5, 7, 3, 4);
    $operacion2 = Operaciones(5, 2, 5, 7, 3, 4);
    echo "<br>";
    echo "Operacion 1<br>";
    echo $operacion1;
    echo "<br>";
    echo "Operacion 2<br>";
    echo $operacion2;
}
