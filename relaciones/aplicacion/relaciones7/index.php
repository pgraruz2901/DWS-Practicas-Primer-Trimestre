<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
include_once(dirname(__FILE__) . "/procesarPuntos.php");
// include_once(dirname(__FILE__) . "/clases/Punto.php");
// Inicializaciones
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion7",
        "LINK" => "/aplicacion/relaciones7"
    ],
    [
        "TEXTO" => "index",
        "LINK" => "/aplicacion/relaciones7/index.php"
    ]
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

    // Recuperar y validar coordenada X
    $x = (int)$_POST["x"];
    if (!validaEntero($x, 0, 500, 0)) {
        $errores["x"] = "El valor de x es incorrecto";
    } else {
        $datos["x"] = $x;
    }

    // Recuperar y validar coordenada Y
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
    try {
        $punto = new Punto($datos["x"], $datos["y"], $datos["color"], $datos["grosor"]);
    } catch (Exception $e) {
        $errores["error"] = $e->getMessage();
    }
}

// VISTA
inicioCabecera("Relación 7");
cabecera();
finCabecera();

inicioCuerpo("Relación 7");
cuerpo($datos, $errores, $arrayPuntos);
finCuerpo();

// FUNCIONES DE VISTA
function cabecera() {}

function cuerpo($datos, $errores, $arrayPuntos)
{
?>
    <form method="post" action="index.php">
        <!-- Coordenadas x e y del punto -->
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
        <span class="error"><?= $errores["y"] ?? "" ?></span><br>
        <br>

        <!-- Selección de color -->
        <label>Color:
            <select name="color">
                <option value="" disabled selected>Escoge color</option>
                <?php
                foreach (Punto::COLORES as $color => $info) {
                    $selected = (($datos["color"] ?? "") === $color) ? "selected" : "";
                    echo "<option value='$color' $selected>$info[nombre]</option>";
                }
                ?>
            </select>
        </label><br>
        <span class="error"><?= $errores["color"] ?? "" ?></span><br>


        <!-- Definir grosor del punto -->
        <p><strong>Grosor del punto:</strong></p>
        <label>
            <input type="radio" name="grosor" value="fino"
                <?= (($datos["grosor"] ?? "") === "fino") ? "checked" : "" ?>>
            Fino
        </label><br>

        <label>
            <input type="radio" name="grosor" value="medio"
                <?= (($datos["grosor"] ?? "") === "medio") ? "checked" : "" ?>>
            Medio
        </label><br>

        <label>
            <input type="radio" name="grosor" value="gordo"
                <?= (($datos["grosor"] ?? "") === "gordo") ? "checked" : "" ?>>
            Gordo
        </label><br><br>
        <span class="error"><?= $errores["grosor"] ?? "" ?></span>
        <br>

        <button type="submit">Guardar</button>
    </form>
<?php
}

function mostrarResumen($datos, $estadosValidos) {}
?>