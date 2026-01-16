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
    $ruta2 = RUTABASE . "/scripts/diciembre/";
    $fichero2 = $ruta2 . "$clase.php";

    if (file_exists($fichero)) {
        require_once($fichero);
    } else if (file_exists($fichero2)) {
        require_once($fichero2);
    } else {
        throw new Exception("La clase $clase no se ha encontrado");
    }
});
spl_autoload_register(function ($clase) {
    $ruta = RUTABASE . "/scripts/diciembre/";
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

$acceso = new Acceso();


include(RUTABASE . "/aplicacion/plantilla/plantilla.php");
include(RUTABASE . "/aplicacion/config/acceso_bd.php");

$COLECCIONES = [];

$coleccion1 = new Coleccion("col1", "01/10/2025", 10);
$coleccion2 = new Coleccion("col2", "02/10/2025", 20);
$coleccion1->aniadirLibro(new Libro("lib1", "aut1", "numPags", 100, "precio", 20));
$coleccion1->aniadirLibro(new Libro("lib2", "aut2", "numPags", 100, "precio", 20));
$coleccion1->aniadirLibro(new Libro("lib3", "aut3", "numPags", 100, "precio", 20));
$coleccion2->aniadirLibro(new Libro("lib1", "aut1", "numPags", 100, "precio", 20));
$coleccion2->aniadirLibro(new Libro("lib2", "aut2", "numPags", 100, "precio", 20));
$coleccion2->aniadirLibro(new Libro("lib3", "aut3", "numPags", 100, "precio", 20));
$COLECCIONES[] = $coleccion1;
$COLECCIONES[] = $coleccion2;
