<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");


$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Enviar",
        "LINK" => "/aplicacion/colecciones/enviar.php"
    ],
];

// VISTA
inicioCabecera("Enviar.php");
cabecera();
finCabecera();

inicioCuerpo("Enviar", $barraUbi);
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
