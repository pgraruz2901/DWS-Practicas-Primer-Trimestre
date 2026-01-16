<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// Array de muebles
$muebles = [
    new MuebleTradicional("Mesa", null, null, null, null, null, 1, 110.0, 25.0, "SM01"),
    new MuebleTradicional("Armario Empotrado", null, null, null, null, null, 2, 320.5, 75.0, "MR02"),
    new MuebleTradicional("Puerta", null, null, null, null, null, 3, 580.0, 95.0, "AM03"),
    new MuebleReciclado("Mesa Reciclada", "Ecotables", "España", 2023, "15/03/2022", "15/03/2040", 1, 120.0, 60),
    new MuebleReciclado("Lámpara reciclada", "EcoLuz", "España", 2021, "01/06/2021", "31/12/2038", 2, 70.5, 90),
    new MuebleReciclado("Posa zapatos", "MueblesPiz", "España", 2024, "01/01/2024", "31/12/2045", 1, 135.0, 80)
];

$indice = isset($_GET['indice']) ? intval($_GET['indice']) : -1;
if ($indice < 0 || $indice >= count($muebles)) {
    die("Índice de mueble inválido");
}

$mueble = $muebles[$indice];
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        if (!$mueble->setNombre($_POST['nombre'])) throw new Exception("Nombre inválido");
        if (!$mueble->setPrecio(floatval($_POST['precio']))) throw new Exception("Precio inválido");
        if (!$mueble->setMaterialPrincipal(intval($_POST['material']))) throw new Exception("Material inválido");

        if (!empty($_POST['pais']) && strlen($_POST['pais']) <= 20) {
            $mueble->setPais($_POST['pais']);
        } else throw new Exception("País inválido");

        $anio = intval($_POST['anio']);
        if ($anio >= 2020 && $anio <= (int)date("Y")) {
            $mueble->setAnio($anio);
        } else throw new Exception("Año inválido");

        if ($mueble instanceof MuebleTradicional) {
            $peso = floatval($_POST['peso']);
            if ($peso >= 15 && $peso <= 300) $mueble->setPeso($peso);
            else throw new Exception("Peso inválido");

            $mueble->setSerie($_POST['serie'] ?? $mueble->getSerie());
        } else {
            $porcentaje = intval($_POST['porcentaje']);
            if ($porcentaje >= 0 && $porcentaje <= 100) $mueble->setPorcentajeReciclado($porcentaje);
            else throw new Exception("Porcentaje reciclado inválido");
        }

        $mensaje = "Mueble modificado correctamente!";
    } catch (Exception $e) {
        $mensaje = "Error: " . $e->getMessage();
    }
}

inicioCabecera("Modificar Mueble");
finCabecera();
inicioCuerpo("Modificar Mueble");
?>

<h2>Modificar Mueble: <?php echo $mueble->getNombre(); ?></h2>
<?php if ($mensaje) echo "<p>$mensaje</p>"; ?>

<form method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $mueble->getNombre(); ?>" maxlength="40"><br><br>

    <label>Precio (€):</label>
    <input type="number" step="0.01" name="precio" value="<?php echo $mueble->getPrecio(); ?>"><br><br>

    <label>Material:</label>
    <select name="material">
        <?php
        foreach (MuebleBase::MATERIALES_POSIBLES as $id => $mat) {
            $sel = ($id == $mueble->getMaterialPrincipal()) ? "selected" : "";
            echo "<option value='$id' $sel>$mat</option>";
        }
        ?>
    </select><br><br>

    <label>País:</label>
    <input type="text" name="pais" value="<?php echo $mueble->getPais(); ?>" maxlength="20"><br><br>

    <label>Año:</label>
    <input type="number" name="anio" value="<?php echo $mueble->getAnio(); ?>"><br><br>

    <?php
    if ($mueble instanceof MuebleTradicional) {
        echo '<label>Peso (kg):</label>';
        echo '<input type="number" step="0.1" name="peso" value="' . $mueble->getPeso() . '"><br><br>';
        echo '<label>Serie:</label>';
        echo '<input type="text" name="serie" value="' . $mueble->getSerie() . '"><br><br>';
    } else {
        echo '<label>Porcentaje reciclado (%):</label>';
        echo '<input type="number" name="porcentaje" value="' . $mueble->getPorcentajeReciclado() . '"><br><br>';
    }
    ?>

    <button type="submit">Guardar Cambios</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && strpos($mensaje, "Error") === false) {
    echo "<h3>Resumen del mueble modificado:</h3>";
    echo "<pre>" . $mueble->__toString() . "</pre>";
}
?>
<br>
<a href="index.php" target="_parent">Volver a la página principal</a>

<?php
finCuerpo();
?>