<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");

// Inicializaciones
$barraUbi = [
    ["TEXTO" => "Inicio",      "LINK" => "/index.php"],
    ["TEXTO" => "Relacion7",   "LINK" => "/aplicacion/relaciones7"],
    ["TEXTO" => "index",       "LINK" => "/aplicacion/relaciones7/index.php"]
];

$datos = [
    "x" => "",
    "y" => "",
    "color" => "",
    "grosor" => ""
];
$errores = [];

// CONTROLADOR
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['borrar'])) {
        $indice = intval($_POST['indice']);
        if (isset($PUNTOS[$indice])) {
            unset($PUNTOS[$indice]);
            $PUNTOS = array_values($PUNTOS);
            // Guardar archivo y recrear imagen
            $f = fopen($nFichero, "w");
            foreach ($PUNTOS as $p) {
                fwrite($f, "{$p->getX()};{$p->getY()};{$p->getColor()};{$p->getGrosor()}\n");
            }
            fclose($f);
            crearImagen($nombreImagen, $PUNTOS);
        }
        header("Location: index.php");
        exit;
    }

    // --- Procesar subida de archivo TXT ---
if (isset($_FILES["archivo_puntos"]) && is_uploaded_file($_FILES["archivo_puntos"]["tmp_name"])) {

    $lineas = file($_FILES["archivo_puntos"]["tmp_name"], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lineas as $linea) {
        $partes = explode(';', $linea);
        if (count($partes) === 4) {
            try {
                $x = intval(trim($partes[0]));
                $y = intval(trim($partes[1]));
                $color = trim($partes[2]);
                $grosor = intval(trim($partes[3]));

                // Validar
                if (!validaEntero($x, 0, 500, 0)) continue;
                if (!validaEntero($y, 0, 500, 0)) continue;
                if (!array_key_exists($color, Punto::COLORES)) continue;
                if (!in_array($grosor, [1,2,3])) continue;

                $punto = new Punto($x, $y, $color, $grosor);
                $PUNTOS[] = $punto;

            } catch (Exception $e) {
                continue; // ignorar líneas inválidas
            }
        }
    }

    // Guardar todos los puntos en el fichero
    $f = fopen($nFichero, "w");
    foreach ($PUNTOS as $p) {
        fwrite($f, "{$p->getX()};{$p->getY()};{$p->getColor()};{$p->getGrosor()}\n");
    }
    fclose($f);

    // Actualizar imagen
    crearImagen($nombreImagen, $PUNTOS);

    // Evitar reenvío de formulario
    header("Location: index.php");
    exit;
}

    // Recuperar coordenada X
    $x = (int)$_POST["x"];
    if (!validaEntero($x, 0, 500, 0)) {
        $errores["x"] = "El valor de x es incorrecto";
    } else {
        $datos["x"] = $x;
    }

    // Recuperar coordenada Y
    $y = (int)$_POST["y"];
    if (!validaEntero($y, 0, 500, 0)) {
        $errores["y"] = "El valor de y es incorrecto";
    } else {
        $datos["y"] = $y;
    }

    // Validar color
    $color = trim($_POST["color"] ?? "");
    if ($color === "") {
        $errores["color"] = "No se ha seleccionado ningún color";
    } else {
        $datos["color"] = $color;
    }

    // Validar grosor
    $grosor = trim($_POST["grosor"] ?? "");
    if ($grosor === "") {
        $errores["grosor"] = "No se ha seleccionado ningún grosor";
    } else {
        $datos["grosor"] = $grosor;
    }

    // Crear objeto Punto
    try {
        $punto = new Punto(intval($datos["x"]), intval($datos["y"]), $datos["color"], intval($datos["grosor"]));
        $PUNTOS[] = $punto;
    } catch (Exception $e) {
        $errores["error"] = $e->getMessage();
    }

// Guardamos el punto
if (!empty($nFichero)) {
    $fichero = fopen($nFichero, "w");
    if ($fichero) {
        foreach ($PUNTOS as $p) {
            $texto = "{$p->getX()} ; {$p->getY()} ; {$p->getColor()} ; {$p->getGrosor()}";
            fwrite($fichero, $texto . "\n");
        }
        fclose($fichero);
    } else {
        echo "Error al abrir el archivo: $nFichero";
    }
} else {
    echo "El nombre del archivo está vacío.";
}
    crearImagen($nombreImagen,$PUNTOS);
}
//Creacion de la imagen solo si no existe


// VISTA
inicioCabecera("Relación 7");
cabecera();
finCabecera();

inicioCuerpo("Relación 7");
cuerpo($datos, $errores, $PUNTOS, $nFichero,$archivoPersonal);
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo($datos, $errores, $PUNTOS, $nFichero = "",$archivoPersonal)
{
?>
    <form method="post" action="index.php">

        <!-- Mantener nombre de archivo entre peticiones -->
        <input type="hidden" name="nFichero" value="<?= htmlspecialchars($nFichero) ?>">

        <label>Coordenada X:
            <input type="number" name="x" maxlength="25"
                value="<?= htmlspecialchars($datos["x"] ?? "") ?>">
        </label><br>
        <span class="error"><?= $errores["x"] ?? "" ?></span>
        <br><br>

        <label>Coordenada Y:
            <input type="number" name="y" maxlength="25"
                value="<?= htmlspecialchars($datos["y"] ?? "") ?>">
        </label><br>
        <span class="error"><?= $errores["y"] ?? "" ?></span>
        <br><br>

        <!-- Selección de color -->
        <label>Color:
            <select name="color">
                <option value="" disabled selected>Escoge color</option>
                <?php
                foreach (Punto::COLORES as $clave => $info) {
                    $selected = (($datos["color"] ?? "") === $clave) ? "selected" : "";
                    echo "<option value='$clave' $selected>{$info["nombre"]}</option>";
                }
                ?>
            </select>
        </label><br>
        <span class="error"><?= $errores["color"] ?? "" ?></span>
        <br><br>

        <p><strong>Grosor del punto:</strong></p>

        <label><input type="radio" name="grosor" value="1"
            <?= (($datos["grosor"] ?? "") === "1") ? "checked" : "" ?>>Fino</label><br>

        <label><input type="radio" name="grosor" value="2"
            <?= (($datos["grosor"] ?? "") === "2") ? "checked" : "" ?>>Medio</label><br>

        <label><input type="radio" name="grosor" value="3"
            <?= (($datos["grosor"] ?? "") === "3") ? "checked" : "" ?>>Grueso</label><br>

        <span class="error"><?= $errores["grosor"] ?? "" ?></span>
        <br><br>

        <button type="submit">Guardar</button>
        <br><br>

        <label>
            <textarea name="punts" id="puntos" cols="60" rows="10">
            <?php
                foreach($PUNTOS as $p){
                    echo $p;
                }
            ?>
            </textarea>
        </label>
        <div>

        <h3>Imagen de puntos</h3>
        <img src="/imagenes/puntos/<?php echo "imagen_".$archivoPersonal .".jpg" ?>" alt="Imagen de puntos">
</div>
    </form>
    <h2>Borrar un punto existente</h2>
    <form method="post" action="index.php">
    <label>Selecciona un punto:</label>
    <select name="indice">
        <?php foreach ($PUNTOS as $i=>$punto): ?>
            <option value="<?= $i ?>">
                <?= "x={$punto->getX()}, y={$punto->getY()}, color={$punto->getColor()}, grosor={$punto->getGrosor()}" ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="borrar">Borrar</button>
    <a href="imagen.php" target="_blank">Descargar imagen</a>
</form>
<!-- FORMULARIO DE SUBIDA DE ARCHIVO -->
<h2>Subir fichero de puntos</h2>
<form method="post" action="index.php" enctype="multipart/form-data">
    <label>Selecciona un fichero TXT:
        <input type="file" name="archivo_puntos" accept=".txt" required>
    </label>
    <br><br>
    <button type="submit">Subir y añadir puntos</button>
</form>
<?php
}

function mostrarResumen($datos, $estadosValidos) {}
?>
