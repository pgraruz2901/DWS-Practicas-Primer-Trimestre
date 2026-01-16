<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador

$numClicks = 1;
setcookie("numClicks", $numClicks, time() +  2 * 24 * 3600, "/");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["login"]) {
        $numClicks += 2;
        setcookie("numClicks", $numClicks, time() +  2 * 24 * 3600, "/");
    }
    if ($numClicks % 3 == 0) {
        $acceso->registrarUsuario("Multiplo", "Multiplo", [1 => true]);
    }
    if ($_POST["unlogin"]) {
        $acceso->quitarRegistroUsuario();
    }
    if ($_POST["modificar"]) {
        header("Location: /aplicacion/colecciones/modificar.php");
    }
}

$nombreUsuario = $acceso->getNombre();

//dibuja la plantilla de la vista
inicioCabecera("Examen Diciembre");
cabecera();
finCabecera();
inicioCuerpo("Examen Diciembre");
cuerpo($nombreUsuario, $COLECCIONES); //llamo a la vista
finCuerpo();



// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo($nombreUsuario, $COLECCIONES)
{
?>
    <form action="index.php" method="post">
        <br>
        <p>Usuario: <?= empty($nombreUsuario) ? "Sin usuario" : $nombreUsuario ?></p>
        <button name="login">loguearse</button>
        <?php
        if (!empty($nombreUsuario)) {
        ?><button name="unlogin">Desloguearse</button><?php
                                                    }
                                                        ?>
        <br><br><textarea name="colecciones">
            <?php
            foreach ($COLECCIONES as $coleccion) {
                echo $coleccion . PHP_EOL;
            }
            ?>
        </textarea>
        <p>Modifica coleccion</p>
        <select name="modificar">
            <?php foreach ($COLECCIONES as $indice => $colec) {
            ?><option value="<?= $indice ?>"><?= $colec->getNombre() ?></option><?php
                                                                            } ?>
        </select><button>Modificar</button>
        <p>Envia colección</p>
        <select name="enviar">
            <?php foreach ($COLECCIONES as $indice => $colec) {
            ?><option value="<?= $indice ?>"><?= $colec->getNombre() ?></option><?php
                                                                            } ?>
        </select>
        <label for="descargar">descargar</label>
        <input type="checkbox" name="descargar">
        <button>Enviar</button>

    </form>
<?php
}
