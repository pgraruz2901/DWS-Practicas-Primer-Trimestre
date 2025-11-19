<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Inicializaciones
$barraUbi = [
    ["TEXTO" => "Inicio",      "LINK" => "/index.php"],
    ["TEXTO" => "index",       "LINK" => "/aplicacion/acceso/login.php"]
];
$errores = [];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST["nick"]) || !isset($_POST["contraseña"])) {
        $errores[] = "No has introducido uno de los dos campos";
    }
}
// VISTA
inicioCabecera("Personalizar");
cabecera();
finCabecera();

inicioCuerpo("Personalizar");
cuerpo();
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo()
{

?>
    <form action="login.php" method="post">
        <label>Nick:
            <input type="text" name="nick">
        </label>
        <label>Contraseña:
            <input type="password" name="contraseña">
        </label>

        <?php
        if (!empty($errores)) {
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li style='color: red;'>$error</li>";
            }
            echo "</ul>";
        }
        ?>

        <button type="submit">Enviar</button>
    </form>


<?php
}

function mostrarResumen() {}
