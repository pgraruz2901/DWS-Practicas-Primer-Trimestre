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
        <li><a href="ejercicio1.php">Ejercicio 1</a></li>
        <li><a href="ejercicio2.php">Ejercicio 2</a></li>
        <li><a href="ejercicio3.php">Ejercicio 3</a></li>
        <li><a href="ejercicio4.php">Ejercicio 4</a></li>
        <li><a href="ejercicio5.php">Ejercicio 5</a></li>
        <li><a href="ejercicio6.php">Ejercicio 6</a></li>
        <li><a href="ejercicio7.php">Ejercicio 7</a></li>
    </ul>
<?php
}
