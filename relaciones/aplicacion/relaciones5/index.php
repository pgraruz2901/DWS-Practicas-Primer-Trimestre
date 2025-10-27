<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//barra ubicacion
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion5",
        "LINK" => "/aplicacion/relaciones5"
    ]
];
$instrumento = new InstrumentoViento();
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
    </ul>
<?php
}
