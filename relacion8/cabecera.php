<?php
include_once(dirname(__FILE__) . "/scripts/librerias/validacion.php");

define("RUTABASE", dirname(__FILE__));
define("MODO_TRABAJO", "desarrollo");


if (MODO_TRABAJO == "produccion")
    error_reporting(0);
else
    error_reporting(E_ALL);

spl_autoload_register(function ($clase) {
    $ruta = RUTABASE . "/scripts/clases/";
    $fichero = $ruta . "$clase.php";

    if (file_exists($fichero)) {
        require_once($fichero);
    }
});
spl_autoload_register(function ($clase) {
    $ruta = RUTABASE . "/aplicacion/clases/";
    $fichero = $ruta . "$clase.php";

    if (file_exists($fichero)) {
        require_once($fichero);
    }
});


const COLORESTEXTO = [
    "negro" => "black",
    "azul" => "blue",
    "blanco" => "white",
    "rojo" => "red"
];

const COLORESFONDO = [
    "blanco" => "white",
    "rojo" => "red",
    "verde" => "green",
    "azul" => "blue",
    "cyan" => "cyan"
];

session_start();

$ACLArray = new ACLArray();
$acceso = new Acceso();


include(RUTABASE . "/aplicacion/plantilla/plantilla.php");
include(RUTABASE . "/aplicacion/config/acceso_bd.php");
