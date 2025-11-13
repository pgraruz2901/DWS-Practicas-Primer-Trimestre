<?php
$fichero = fopen(__DIR__ . "/prueba.txt", "a");
fwrite($fichero, "Hola mundo\n");
fclose($fichero);