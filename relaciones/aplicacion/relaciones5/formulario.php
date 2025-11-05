<?php
function formulario($datos, $errores)
{
    // Mostrar errores
    if ($errores) {
        echo "<div class='error'><strong>Errores detectados:</strong><br>";
        foreach ($errores as $campo => $mensajes) {
            foreach ($mensajes as $m) {
                echo htmlspecialchars("$campo: $m") . "<br>";
            }
        }
        echo "</div><br>";
    }

    // Formulario
?>
    <form method="post" action="">
        <label>Nombre: <input type="text" name="nombre" maxlength="25" value="<?= htmlspecialchars($datos["nombre"]) ?>"></label><br>

        <label>Contraseña: <input type="password" name="contraseña" maxlength="15" value="<?= htmlspecialchars($datos["contraseña"]) ?>"></label><br>

        <label>Fecha de nacimiento (DD/MM/YYYY): <input type="text" name="fechaNac" value="<?= htmlspecialchars($datos["fechaNac"]) ?>"></label><br>

        <fieldset>
            <legend>Fecha del carnet:</legend>
            Día: <input type="number" name="diaCarnet" min="1" max="31" value="<?= htmlspecialchars($datos["diaCarnet"]) ?>">
            Mes: <input type="number" name="mesCarnet" min="1" max="12" value="<?= htmlspecialchars($datos["mesCarnet"]) ?>">
            Año: <input type="number" name="anioCarnet" min="1900" max="2100" value="<?= htmlspecialchars($datos["anioCarnet"]) ?>">
        </fieldset>

        <label>Hora de levantarse (HH:MM): <input type="text" name="horaLevantarse" value="<?= htmlspecialchars($datos["horaLevantarse"]) ?>"></label><br>

        <fieldset>
            <legend>Estado:</legend>
            <?php
            $estados = [1 => "Estudiante", 2 => "En paro", 3 => "Trabajando", 4 => "Jubilado", 5 => "Incorrecta"];
            foreach ($estados as $k => $v) {
                $checked = ($datos["estado"] == $k) ? "checked" : "";
                echo "<label><input type='radio' name='estado' value='$k' $checked> $v</label><br>";
            }
            ?>
        </fieldset>

        <fieldset>
            <legend>Estudios:</legend>
            <?php
            $estudiosLista = [0 => "Sin estudios", 1 => "Primaria", 2 => "Secundaria", 3 => "Bachillerato", 4 => "Ciclo formativo", 5 => "Universitarios", 6 => "Incorrecta"];
            foreach ($estudiosLista as $k => $v) {
                $checked = in_array($k, $datos["estudios"]?? array()) ? "checked" : "";
                echo "<label><input type='checkbox' name='estudios[]' value='$k' $checked> $v</label><br>";
            }
            ?>
        </fieldset>

        <label>Hermanos: <input type="number" name="hermanos" min="0" max="20" value="<?= htmlspecialchars($datos["hermanos"]) ?>"></label><br>

        <label>Sueldo (€): <input type="number" step="0.01" name="sueldo" min="1000" max="150000" value="<?= htmlspecialchars($datos["sueldo"]) ?>"></label><br><br>

        <input type="submit" value="Enviar">
    </form>
<?php
}
