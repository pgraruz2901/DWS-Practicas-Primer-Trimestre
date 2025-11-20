<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Inicializaciones
$barraUbi = [
    ["TEXTO" => "Inicio",      "LINK" => "/index.php"],
    ["TEXTO" => "index",       "LINK" => "/aplicacion/cookies_sesiones.php"]
];
if (!$acceso->hayUsuario()) {
    header("Location: /aplicacion/acceso/login.php");
    exit();
}
if (!$acceso->puedePermiso(1)) {
    paginaError("no tienes los suficientes permisos");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    setcookie("color_fondo", $_POST["fondo"], time() +  2 * 24 * 3600, "/");
    setcookie("color_texto", $_POST["texto"], time() +  2 * 24 * 3600, "/");
    if (!$acceso->puedePermiso(2)) {
        paginaError("no tienes los suficientes permisos");
        exit();
    }
    header("Location: personalizar.php");
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
    <form action="personalizar.php" method="post">
        <label>Color Fondo
            <select name="fondo" id="fondo">
                <?php foreach (COLORESFONDO as $color => $value) {
                    $colorSelect = ($value == $_COOKIE["color_fondo"]) ? "selected" : "";
                    echo "<option value='$value' $colorSelect>" . $color . "</option>";
                } ?>
            </select>
        </label>
        <br>
        <br>
        <label>Color Texto
            <select name="texto" id="texto">
                <?php foreach (COLORESTEXTO as $color => $value) {
                    $colorSelect = ($value == $_COOKIE["color_texto"]) ? "selected" : "";
                    echo "<option value='$value' $colorSelect>" . $color . "</option>";
                } ?>
            </select>
        </label>
        <br>
        <br>
        <button type="submit">Enviar</button>


    </form>

<?php


}

function mostrarResumen($datos, $estadosValidos) {}
