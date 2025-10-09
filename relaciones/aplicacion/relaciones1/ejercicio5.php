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
        "TEXTO" => "Ejercicio5",
        "LINK" => "/aplicacion/relaciones1/ejercicio5.php"
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
    <br>
<?php

    $vector = array();
    $vector[1] = "esto es una cadena";
    $vector["posi1"] = 25.67;
    $vector[] = false;
    $vector["ultima"] = array(2, 5, 96);
    $vector[56] = 23;

    foreach ($vector as $clave => $valor) {

        echo "posicion " . $clave . " contenido " . gettype($valor);
        echo "<br>";
        $tipo = gettype($valor);
        switch ($tipo) {
            case "array":
                foreach ($valor as $clave2 => $valor2) {
                    echo $valor2;
                    echo "<br>";
                }
                break;
            case "integer":
                echo $valor . " en binario = " . decbin($valor);
                break;
            case "double":
                echo $valor . " que el cuadrado es " . $valor * $valor . "<br>";
                break;
            case "string":
                echo $valor . "<br>";
                break;
            case "boolean":
                echo $valor ? 'True' : "False" . " y su opuesto es " . (!$valor ? "true" : "false") . "<br>";
                break;
        }
        echo "<br>";
    }
}
