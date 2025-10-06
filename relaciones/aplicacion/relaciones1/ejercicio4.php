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
        "TEXTO" => "Ejercicio2",
        "LINK" => "/aplicacion/relaciones1/ejercicio4.php"
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
    $filas = 5;
    $array = [];
    for ($i = 0; $i < $filas; $i++) {
        $array[$i] = [];
        for ($j = 0; $j < ($i + 1); $j++) {
            $array[$i][$j] = $i + 1;
        }
    }


    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < ($i + 1); $j++) {
            echo $array[$i][$j] . " ";
        }
        echo "<br>";
    }
}
