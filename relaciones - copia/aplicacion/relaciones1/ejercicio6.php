<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//barra ubicacion
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion1",
        "LINK" => "/aplicacion/relaciones1"
    ],
    [
        "TEXTO" => "Ejercicio6",
        "LINK" => "/aplicacion/relaciones1/ejercicio6.php"
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

?>

<?php


    $vector = array("primera" => 12.56, 24 => true, 67 => 23.76);

    $keys = array_keys($vector);
    $values = array_values($vector);

    echo "<h3>array_walk</h3>";
    array_walk($vector, function ($value, $key) {
        echo "Id $key, contenido $value <br><br>";
    });

    echo "<h3>array_keys</h3>";
    array_walk($keys, function ($value, $key) {
        echo "Valor $value <br><br>";
    });

    echo "<h3>array_values</h3>";
    array_walk($values, function ($value, $key) {
        echo "Valor $value <br><br>";
    });
}
