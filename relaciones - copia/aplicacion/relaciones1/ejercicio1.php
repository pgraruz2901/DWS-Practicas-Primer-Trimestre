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
        "LINK" => "/aplicacion/relaciones1"
    ],
    [
        "TEXTO" => "Ejercicio1",
        "LINK" => "/aplicacion/relaciones1/ejercicio1.php"
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
?>
    <h1>ROUND</h1>

<?php
    echo "3.14159";
    echo "<br />";
    echo round(3.14159); // 3

    echo "<h1>floor</h1>";
    echo "3.14159";
    echo "<br />";
    echo floor(3.14159); // 3

    echo "<h1>pow</h1>";
    echo "2^3";
    echo "<br />";
    echo pow(2, 3); // 8

    echo "<h1>sqrt</h1>";
    echo "sqrt(9)";
    echo "<br />";
    echo sqrt(9); // 3

    echo "<h1>Entero a Hexadecimal</h1>";
    echo "255";
    echo "<br />";
    echo dechex(255); // ff

    echo "<h1>De base 4 a Base 8</h1>";
    echo "3210 (base 4)";
    echo "<br />";
    echo base_convert("3210", 4, 8); // 150

    echo "<h1>Binario a Decimal</h1>";
    echo "1101 (base 2)";
    echo "<br />";
    echo bindec("1101"); // 13

    echo "<h1>El valor mas grande</h1>";
    echo "1, 2, 3";
    echo "<br />";
    echo max(1, 2, 3); // 3

    echo "<h1>variable en binario y decimal</h1>";
    $var = 1101;
    echo "Variable (binario) = " . $var; // 1
    echo "<br />";
    echo "Variable en decimal = " . bindec($var); // 1

    echo "<h1>variable en octal y decimal</h1>";
    $var = 1576;
    echo "Variable (octal) = " . $var; // 1576
    echo "<br />";
    echo "Variable en decimal = " . octdec($var); // 1

    echo "<h1>variable en hexadecimal y decimal</h1>";
    $var = "1A3F";
    echo "Variable (hexadecimal) = " . $var; // 1A3F
    echo "<br />";
    echo "Variable en decimal = " . hexdec($var); // 6719


}
