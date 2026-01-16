<?php

include_once(dirname(__FILE__) . "/../../cabecera.php");

$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Index",
        "LINK" => "/aplicacion/principal/index.php"
    ]
];

// ----- CONTROLADOR -----
$datos = [];

try {
    // Definir array de muebles con nombres y propiedades
    $muebles = [];

    // Muebles tradicionales
    $muebles[] = new MuebleTradicional("Mesa", null, null, null, null, null, 1, 110.0, 25.0, "SM01");
    $muebles[] = new MuebleTradicional("Armario Empotrado", null, null, null, null, null, 2, 320.5, 75.0, "MR02");
    $muebles[] = new MuebleTradicional("Puerta", null, null, null, null, null, 3, 580.0, 95.0, "AM03");

    // Muebles reciclados
    $muebles[] =  new MuebleReciclado("Mesa Reciclada", "Ecotables", "España", 2023, "15/03/2022", "15/03/2040", 1, 120.0, 60);
    $muebles[] = new MuebleReciclado(
        "Lámpara reciclada",
        "EcoLuz",
        "España",
        2021,
        "01/06/2021",
        "31/12/2038",
        1,
        70.5,
        90
    );
    $muebles[] = new MuebleReciclado("Posa zapatos", "MueblesPiz", "España", 2024, "01/01/2024", "31/12/2045", 1, 135.0, 80);

    // Añadir características adicionales
    $muebles[0]->añadir("color", "blanco", "material", "metal");
    $muebles[1]->añadir("color", "rojo", "capacidad", "4 personas");
    $muebles[2]->añadir("color", "negro", "resistencia", "alta");
    $muebles[3]->añadir("color", "madera natural", "acabado", "barniz");
    $muebles[4]->añadir("color", "amarillo", "tipo LED", "RGB");
    $muebles[5]->añadir("color", "gris oscuro", "niveles", 5);

    $datos['muebles'] = $muebles;

    // Procesar formulario
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["indiceMueble"])) {
        $idx = intval($_POST["indiceMueble"]);

        if (isset($muebles[$idx])) {
            $mueble = $muebles[$idx];

            if (isset($_POST["accionMostrar"])) {
                $datos['accion'] = "mostrar";
                $detalle = "";
                foreach ($mueble->dameListaPropiedades() as $prop => $valor) {
                    $res = "";
                    $mueble->damePropiedad($prop, 2, $res);
                    $detalle .= "$prop: $res\n";
                }
                $datos['muebleSeleccionado'] = $detalle;
            }

            if (isset($_POST["accionModificar"])) {
                $mueble->añadir("estado", "actualizado");
                $datos['accion'] = "modificado";
                $detalle = "";
                foreach ($mueble->dameListaPropiedades() as $prop => $valor) {
                    $res = "";
                    $mueble->damePropiedad($prop, 2, $res);
                    $detalle .= "$prop: $res\n";
                }
                $datos['muebleSeleccionado'] = $detalle;
            }
        }
    }
} catch (Exception $e) {
    $datos['error'] = $e->getMessage();
}

// ----- VISTA -----
inicioCabecera("2DAW Aplicación Muebles");
cabecera();
finCabecera();

inicioCuerpo("2DAW Aplicación Muebles", $barraUbi);
cuerpo($datos);
finCuerpo();


// **********************************************************
function cabecera() {}

function cuerpo($datos)
{
?>
    <h2>Lista de Muebles Disponibles</h2>

    <?php if (isset($datos['error'])): ?>
        <p>Error: <?= htmlspecialchars($datos['error']) ?></p>
    <?php endif; ?>

    <?php $muebles = $datos['muebles'] ?? []; ?>

    <?php if (!empty($muebles)): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Índice</th>
                    <th>Clase</th>
                    <th>Nombre</th>
                    <th>Precio (€)</th>
                    <th>País</th>
                    <th>Año</th>
                    <th>Material</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($muebles as $i => $mueble): ?>
                    <?php
                    $resNombre = $resPrecio = $resPais = $resAnio = $resMat = "";
                    $mueble->damePropiedad("nombre", 2, $resNombre);
                    $mueble->damePropiedad("precio", 2, $resPrecio);
                    $mueble->damePropiedad("pais", 2, $resPais);
                    $mueble->damePropiedad("anio", 2, $resAnio);
                    $mueble->damePropiedad("MaterialPrincipal", 2, $resMat);
                    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= get_class($mueble) ?></td>
                        <td><?= htmlspecialchars($resNombre) ?></td>
                        <td><?= htmlspecialchars($resPrecio) ?></td>
                        <td><?= htmlspecialchars($resPais) ?></td>
                        <td><?= htmlspecialchars($resAnio) ?></td>
                        <td><?= MuebleBase::MATERIALES_POSIBLES[$resMat] ?? '-' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay muebles disponibles.</p>
    <?php endif; ?>

    <hr>

    <form method="post">
        <label for="indiceMueble">Selecciona un mueble:</label>
        <select name="indiceMueble" id="indiceMueble" required>
            <option value="">-- Selecciona --</option>
            <?php foreach ($muebles as $i => $mueble): ?>
                <?php $nombre = "";
                $mueble->damePropiedad("nombre", 2, $nombre); ?>
                <option value="<?= $i ?>"><?= $i ?> - <?= htmlspecialchars($nombre) ?></option>
            <?php endforeach; ?>
        </select>

        <br><br>
        <button type="submit" name="accionMostrar">Mostrar Mueble</button>
        <button type="button" onclick="window.open('modificarMueble.php?indice=' + document.getElementById('indiceMueble').value, 'Modificar', 'width=600,height=600')">
            Modificar Mueble
        </button>
    </form>

    <hr>

    <?php if (isset($datos['accion'])): ?>
        <?php if ($datos['accion'] === "mostrar"): ?>
            <h3>Propiedades del mueble seleccionado:</h3>
            <pre><?= htmlspecialchars($datos['muebleSeleccionado']) ?></pre>
        <?php elseif ($datos['accion'] === "modificado"): ?>
            <h3>Mueble actualizado correctamente:</h3>
            <pre><?= htmlspecialchars($datos['muebleSeleccionado']) ?></pre>
        <?php endif; ?>
    <?php endif; ?>
<?php
}
?>