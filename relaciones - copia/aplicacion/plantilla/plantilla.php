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
            href="/estilo/base.css">
    <?php
}
function finCabecera()
{
    ?>
    </head>
<?php
}
function inicioCuerpo(string $cabecera, array $barraUbi = [])
{
    global $acceso;
?>

    <body>
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
                    <li><a href="/aplicacion/relaciones1">Relaciones1</a></li>
                    <li><a href="/aplicacion/relaciones2">Relaciones2</a></li>
<<<<<<< HEAD
                    <li><a href="/aplicacion/relaciones3">Relaciones3</a></li>
                    <li><a href="/aplicacion/relaciones4">Relaciones4</a></li>
=======
>>>>>>> relacion3

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
