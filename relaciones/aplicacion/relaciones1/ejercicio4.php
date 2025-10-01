<?php
$filas = 5;
$array = [];
for ($i = 0; $i < $filas; $i++) {
    $array[$i] = [];
    for ($j = 0; $j < ($i+1); $j++) {
        $array[$i][$j] = $i+1;
    }
}


for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < ($i+1); $j++) {
        echo $array[$i][$j]." ";
    }
    echo "<br>";
}
