<?php
// header("Location: index.php");
$arrayPuntos = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $arrayPuntos[] = new Punto($_POST["x"], $_POST["y"], $_POST["color"], $_POST["grosor"]);
    } catch (Exception $e) {
        $errores["error"] = $e->getMessage();
    }
}
