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
        "TEXTO" => "Ejercicio3",
        "LINK" => "/aplicacion/relaciones2/ejercicio3.php"
    ]
];
$caracteres_permitidos = str_split('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
$longitud = 20;
inicioCabecera("Ejercicios");
cabecera();
finCabecera();

inicioCuerpo("Ejercicios", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
function cabecera() {}
function cuerpo()
{
    global $longitud, $caracteres_permitidos;
    echo "<br>3.- Genera una cadena aleatoria de 20 caracteres (los caracteres permitidos son letras
    minúsculas, letras mayúsculas y números)<br><br>";
    echo "a) A partir de un array en el que están todos los caracteres posibles que cumplen la
condición. (tienes que rellenar el array con todos los caracteres validos)<br><br>";
    $cadenaAleatoria = "";
    for ($i = 0; $i < $longitud; $i++) {
        $cadenaAleatoria .= $caracteres_permitidos[mt_rand(0, count($caracteres_permitidos) - 1)];
    };
    echo $cadenaAleatoria;

    echo "<br><br>b) A partir del código ASCII (se puede indicar un rango mayor y eliminar aquellos
caracteres que no lo cumplan).<br><br>";
    $cadenaAleatoria2 = "";
    for ($i = 0; $i < $longitud; $i++) {
<<<<<<< HEAD

        do {
            $caracter = mt_rand(48, 122);
        } while (($caracter >= 58 && $caracter <= 64) || ($caracter >= 91 && $caracter <= 96));

        $cadenaAleatoria2 .= chr($caracter);
=======
        $cadenaAleatoria2 .= chr(mt_rand(32, 126));
>>>>>>> relacion3
    }
    echo $cadenaAleatoria2;
}
