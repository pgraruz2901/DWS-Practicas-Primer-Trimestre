<?php
function paginaError(string $mensaje)
{
    header("HTTP/1.0 404 $mensaje");
    inicioCabecera("PRACTICA");
    finCabecera();
    inicioCuerpo("ERROR");
    echo "<br />\n";
    echo $mensaje;
    echo "<br />\n";
    echo "<br />\n";
    echo "<br />\n";
    echo "<a href='/index.php'>Ir a la pagina principal</a>\n";

    finCuerpo();
}
function inicioCabecera($titulo)
{
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <!-- Always force latest IE rendering engine (even in
intranet) & Chrome Frame
 Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible"
            content="IE=edge,chrome=1">
        <title><?php echo $titulo ?></title>
        <meta name="description" content="">
        <meta name="author" content="Administrador">
        <meta name="viewport" content="width=device-width; initialscale=1.0">
        <!-- Replace favicon.ico & apple-touch-icon.png in the root
of your domain and delete these references -->
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="stylesheet" type="text/css"
            href="/estilo/base1.css">
    <?php
}
function finCabecera()
{
    ?>
    </head>
<?php
}

if (!isset($_COOKIE["color_fondo"])) {
    setcookie("color_fondo", COLORESFONDO["blanco"], time() +  2 * 24 * 3600, "/");
}
if (!isset($_COOKIE["color_texto"])) {
    setcookie("color_texto", COLORESTEXTO["negro"], time() +  2 * 24 * 3600, "/");
}

function inicioCuerpo(string $cabecera, array $barraUbi = [])
{
    $colorTexto = $_COOKIE["color_texto"] ?? COLORESTEXTO["negro"];
    $colorFondo = $_COOKIE["color_fondo"] ?? COLORESFONDO["blanco"];

    global $acceso;
?>

    <body style="background-color: <?= $colorFondo ?>; color: <?= $colorTexto ?>;">
        <div id="documento">

            <header>
                <h1 id="titulo"><?php echo $cabecera; ?></h1>
            </header>

            <div id="barraLogin">

            </div>
            <div id="barraMenu">
                <ul>
                    <li><a href="/index.php">Inicio</a></li>
                    <li><a href="/aplicacion/pruebas">pruebas</a></li>
                    <li><a href="/aplicacion/personalizar/personalizar.php">Personalizar</a></li>
                    <li><a href="/aplicacion/texto/verTextos.php">Texto</a></li>

                </ul>
            </div>
            <div id="barraUbicacion">
                <?php
                if ($barraUbi) {
                    foreach ($barraUbi as $elemento) {
                        if (isset($elemento["TEXTO"]) && ($elemento["LINK"])) {
                            if ($elemento["LINK"]) {
                                echo "<a href=\"{$elemento["LINK"]}\">";
                                echo $elemento["TEXTO"];
                            }
                            if ($elemento["LINK"]) {
                                echo "<a href=\"{$elemento["LINK"]}\">";
                                echo "</a>";
                                echo ">> ";
                            }
                        }
                    }
                }
                ?>
            </div>

            <div>
            <?php
        }
        function finCuerpo()
        {
            ?>
                <br />
                <br />
            </div>
            <footer>
                <hr width="90%" />
                <div>
                    &copy; Copyright Pablo Gabriel Granados Ruz
                </div>
            </footer>
        </div>
    </body>

    </html>
<?php
        }
