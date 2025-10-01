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
        case "integer":
            
    }
    echo "<br>";
}
