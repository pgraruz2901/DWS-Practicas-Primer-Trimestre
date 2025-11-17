<?php
include_once(dirname(__FILE__) . "/../cabecera.php");

// Inicializaciones
$barraUbi = [
    ["TEXTO" => "Inicio",      "LINK" => "/index.php"],
    ["TEXTO" => "index",       "LINK" => "/aplicacion/cookies_sesiones.php"]
];

setcookie("informacion", "hoy es lunes", time() + 2 * 24 * 3600);

if (isset($_COOKIE["informacion"])) {
    $informacion = $_COOKIE["informacion"];
}

$_SESSION["teclado"] = "español";
$_SESSION["usado"] = false;

// VISTA
inicioCabecera("Relación 7");
cabecera();
finCabecera();

inicioCuerpo("Relación 7");
cuerpo();
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo() {}

function mostrarResumen($datos, $estadosValidos) {}
