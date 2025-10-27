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
        "TEXTO" => "Ejercicio7",
        "LINK" => "/aplicacion/relaciones4/Ejercicio7/index.php"
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
    echo "<br>";
    $Objeto = new ClaseMisPropiedades();
    $Objeto->propPublica = "publica";
    $Objeto->propiedad1 = 25;
    $Objeto->propiedad2 = "cadena de texto";
    echo "la propiedad 1 vale " . $Objeto->propiedad1 . "<br>" .
        "la propiedad 2 vale " . $Objeto->propiedad2 . "<br>";
}
