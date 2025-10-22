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
        "LINK" => "/aplicacion/relaciones2"
    ],
    [
        "TEXTO" => "Ejercicio1",
        "LINK" => "/aplicacion/relaciones2/ejercicio1.php"
    ]
];
$cadena1 = "<h1> è, à, ñ</h1>";
$cadena2 = '<h1> è, à, ñ</h1>';
$cadena3 = <<<HEREDOC
<h1>', è, à, ñ</h1>
HEREDOC;
$cadena4 = <<<NOWDOC
<h1>', è, à, ñ</h1>
NOWDOC;
inicioCabecera("Ejercicios");
cabecera();
finCabecera();

inicioCuerpo("Ejercicios", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
function cabecera() {}
function cuerpo()
{
    global $cadena1, $cadena2, $cadena3, $cadena4;
    echo "<br>Usando comillas dobles<br>";
    echo $cadena1;
    echo "Usando comillas simples<br>";
    echo $cadena2;
    echo "Usando HEREDOC<br>";
    echo $cadena3;
    echo "Usando NOWDOC<br>";
    echo $cadena4;
}
