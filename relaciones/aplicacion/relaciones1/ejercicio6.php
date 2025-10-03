<?php


$vector = array("primera" => 12.56, 24 => true, 67 => 23.76);

$keys = array_keys($vector);
$values = array_values($vector);

echo "<h3>array_walk</h3>";
array_walk($vector, function ($value, $key) {
    echo "Id $key, contenido $value <br><br>";
});

echo "<h3>array_keys</h3>";
array_walk($keys, function ($value, $key) {
    echo "Valor $value <br><br>";
});

echo "<h3>array_values</h3>";
array_walk($values, function ($value, $key) {
    echo "Valor $value <br><br>";
});
