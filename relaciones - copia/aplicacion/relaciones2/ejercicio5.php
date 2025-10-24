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
        "TEXTO" => "Ejercicio5",
        "LINK" => "/aplicacion/relaciones2/ejercici5.php"
    ]
];

$cadena = <<<NOWDOC
    <h3>prueba1</h3>
    <h4>prueba2</h4>
    <p>1</p>
    2
    34
    <p>567</p>
    8910
    aaaaaa@aaaa.aa
    bbbbbb@bbbb.bb
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
    global $cadena;
    echo "<br>Define expresiones regulares apropiadas para localizar los distintos elementos creados
(etiqueta, numero y dirección de email) en la cadena.
Muestra la posición/elemento encontrado usando las expresiones regulares definidas y la
función preg_match.";
    echo "<br>";
    // 🔹 Expresiones regulares (alternativas)
    $etiquetas = '/<\s*\/?\s*[a-zA-Z0-9]+\s*[^>]*>/';
    $numeros   = '/(?<!\w)(?:\+|-)?\d+(?:\.\d+)?(?!\w)/';
    $emails    = '/\b[\w.-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,6}\b/';

    // 🔹 Etiquetas HTML
    if (preg_match_all($etiquetas, $cadena, $matches, PREG_OFFSET_CAPTURE)) {
        echo "<h4>Etiquetas encontradas</h4>";
        foreach ($matches[0] as $m) {
            echo "<li> {$m[1]}: <code>" . htmlspecialchars($m[0]) . "</code></li>";
        }
        echo "</ul>";
    }

    // 🔹 Números
    if (preg_match_all($numeros, $cadena, $matches, PREG_OFFSET_CAPTURE)) {
        echo "<h4>Números encontrados</h4>";
        foreach ($matches[0] as $m) {
            echo "<li>{$m[1]}: <code>{$m[0]}</code></li>";
        }
        echo "</ul>";
    }

    // 🔹 Emails
    if (preg_match_all($emails, $cadena, $matches, PREG_OFFSET_CAPTURE)) {
        echo "<h4>Emails encontrados</h4>";
        foreach ($matches[0] as $m) {
            echo "<li>{$m[1]}: <code>{$m[0]}</code></li>";
        }
        echo "</ul>";
    }
}
