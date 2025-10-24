<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//barra ubicacion
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion3",
        "LINK" => "/aplicacion/relaciones3"
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
    <ul>
        <li><a href="Ejercicio1/index.php">Ejercicio 1</a></li>
        <li><a href="Ejercicio2/index.php">Ejercicio 2</a></li>
        <li><a href="Ejercicio3/index.php">Ejercicio 3</a></li>
        <li><a href="Ejercicio4/index.php">Ejercicio 4</a></li>
        <li><a href="Ejercicio5/index.php">Ejercicio 5</a></li>
        <li><a href="Ejercicio6/index.php">Ejercicio 6</a></li>
        <li><a href="Ejercicio7/index.php">Ejercicio 7</a></li>
    </ul>
<?php
}
