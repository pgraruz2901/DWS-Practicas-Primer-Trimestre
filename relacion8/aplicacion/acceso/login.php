<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Inicializaciones
$barraUbi = [
    ["TEXTO" => "Inicio",      "LINK" => "/index.php"],
    ["TEXTO" => "index",       "LINK" => "/aplicacion/acceso/login.php"]
];
$errores = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["nick"]) || empty($_POST["contraseña"])) {
        $errores[] = "No has introducido alguno de los dos campos";
    } else {
        if ($ACLArray->esValido($_POST["nick"], $_POST["contraseña"])) {
            $codUsuario = $ACLArray->getCodUsuario($_POST["nick"]);
            $permisos = $ACLArray->getPermisos($codUsuario);
            $nombre = $ACLArray->getNombre($codUsuario);
            $acceso->registrarUsuario($_POST["nick"], $nombre, $permisos);
        } else {
            $errores[] = "Credenciales incorrectas";
        }
    }
}
// VISTA
inicioCabecera("Personalizar");
cabecera();
finCabecera();

inicioCuerpo("Personalizar");
cuerpo($errores);
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo($errores)
{

?>
    <form action="login.php" method="post">
        <label>Nick:
            <input type="text" name="nick" id="nick">
        </label><br><br>
        <label>Contraseña:
            <input type="password" name="contraseña" id="contraseña">
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
        <br><br>
        <button type="submit">Enviar</button>
    </form>


<?php
}

function mostrarResumen() {}
