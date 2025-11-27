<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");


$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Pruebas",
        "LINK" => "/aplicacion/prueba/pruebabd.php"
    ],
];

// VISTA
inicioCabecera("---");
cabecera();
finCabecera();

inicioCuerpo("---", $barraUbi);
cuerpo();
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo()
{

?>


<?php
}

function mostrarResumen() {}
