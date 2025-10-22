<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//barra ubicacion
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion2",
        "LINK" => "/aplicacion/relaciones2"
    ],
    [
        "TEXTO" => "Ejercicio2",
        "LINK" => "/aplicacion/relaciones2/ejercicio2.php"
    ]
];
$cadena = "Está la niña en casa";
inicioCabecera("Ejercicios");
cabecera();
finCabecera();

inicioCuerpo("Ejercicios", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
function cabecera() {}
function cuerpo()
{
    global $cadena;
    echo "Mostrar la cadena usando []<br>";
    for ($i = 0; $i < strlen($cadena); $i++) {
        for ($j = 0; $j < $i; $j++) {
            echo "&nbsp";
        }
        echo $cadena[$i];
        echo "<br>";
    }
    echo "Mostrar la cadena usando substr<br>";
    for ($i = 0; $i < strlen($cadena); $i++) {
        $palabra = substr($cadena, $i, 1);
        for ($j = 0; $j < $i; $j++) {
            echo "&nbsp";
        }
        echo $palabra;
        echo "<br>";
    }
    echo "Mostrar la cadena usando mb_substr<br>";
    for ($i = 0; $i < strlen($cadena); $i++) {
        $palabra = mb_substr($cadena, $i, 1);
        for ($j = 0; $j < $i; $j++) {
            echo "&nbsp";
        }
        echo $palabra;
        echo "<br>";
    }
    echo "Mostrar cadena en orden inverso usando mb_substr, con pares en mayuscula y impares en minuscula<br>";
    for ($i = strlen($cadena) - 1; $i >= 0; $i--) {
        if ($i % 2 == 0) {
            $palabra = mb_strtoupper(mb_substr($cadena, $i, 1));
        } else {
            $palabra = mb_strtolower(mb_substr($cadena, $i, 1));
        }
        for ($j = strlen($cadena) - 1; $j > $i; $j--) {
            echo "&nbsp";
        }
        echo $palabra;
        echo "<br>";
    }
    echo "Separa la cadena en partes usando el carácter a, y mostrar cada parte en una línea
    distinta<br>";
    $partes = explode("a", $cadena);
    foreach ($partes as $parte) {
        echo  $parte . "<br>";
    }
    echo "Localiza en la cadena la palabra niña y cambia el siguiente carácter a niña (el
espacio en blanco) por `/mujer`<br>";
    $cadenaNueva = str_replace("niña ", "niña/mujer ", $cadena);
    echo $cadenaNueva;
}
