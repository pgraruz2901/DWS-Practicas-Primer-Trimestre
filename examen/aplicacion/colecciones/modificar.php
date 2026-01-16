<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");


$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Modificar",
        "LINK" => "/aplicacion/colecciones/modificar.php"
    ],
];

// VISTA
inicioCabecera("Modificar");
cabecera();
finCabecera();

inicioCuerpo("Modificar", $barraUbi);
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
