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
        "TEXTO" => "Ejercicio3",
        "LINK" => "/aplicacion/relaciones4/Ejercicio3/index.php"
    ]
];
$instrumento = new InstrumentoViento();
$instrumento2 = new InstrumentoViento("hola", 2, "PAPEL");
inicioCabecera("Ejercicios");
cabecera();
finCabecera();
inicioCuerpo("Ejercicios", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
function cabecera() {}
function cuerpo()
{
    global $instrumento, $instrumento2;
    echo $instrumento;
    echo "$instrumento2";
}
