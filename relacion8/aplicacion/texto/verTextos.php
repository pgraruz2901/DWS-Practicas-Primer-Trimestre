<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");


if (!$acceso->hayUsuario()) {
    header("Location: /aplicacion/acceso/login.php");
    exit();
}
if (!$acceso->puedePermiso(1)) {
    paginaError("no tienes los suficientes permisos");
    exit();
}
// Inicializaciones
$barraUbi = [
    ["TEXTO" => "Inicio",      "LINK" => "/index.php"],
    ["TEXTO" => "index",       "LINK" => "/aplicacion/cookies_sesiones.php"]
];

$textos = $_SESSION["texto"] ?? [];
$texto = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $texto = $_POST["texto"] ?? "";

    $registroNuevo = new RegistroTexto($texto);
    $textos[] = $registroNuevo;
    $_SESSION["texto"] = $textos;
    if (isset($_POST["limpiar"])) {
        $_SESSION["texto"] = [];
        header("Location: verTextos.php");
    }
}
// VISTA
inicioCabecera("Personalizar");
cabecera();
finCabecera();

inicioCuerpo("Personalizar");
cuerpo($textos);
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo($textos)
{

?>
    <form action="verTextos.php" method="post">
        <h3>Introduce el texto a introducir</h3>
        <label>
            <input type="text" name="texto">
        </label>
        <br>
        <br>
        <button type="submit" name="enviar">enviar</button>
        <br>
        <br>
        <textarea name="textos" cols="30" rows="5" readonly>
            <?php foreach ($textos as $text) {
                echo $text . PHP_EOL;
            }
            ?>
        </textarea>
        <br><br>
        <button name="limpiar">Limpiar</button>
    </form>


<?php
}

function mostrarResumen() {}
