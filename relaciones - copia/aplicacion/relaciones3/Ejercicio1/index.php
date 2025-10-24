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
        "TEXTO" => "Ejercicio1",
        "LINK" => "/aplicacion/relaciones3/Ejercicio1/index.php"
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
    $vector = array();
    $numero = 0;
    cuentaVeces($vector, "1osición", 7, $numero);
    cuentaVeces($vector, "otra", 2, $numero);
    echo "<br>";
    foreach ($vector as $clave => $valor) {
        echo $clave . ": " . $valor . "<br>";
        echo "Número de repeticiones: " . $numero . "<br>";
    }
}
