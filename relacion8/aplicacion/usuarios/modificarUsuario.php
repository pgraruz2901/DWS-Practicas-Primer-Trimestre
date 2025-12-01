<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
// if (!$acceso->puedePermiso(3) || !$acceso->puedePermiso(2)) {
//     paginaError("no tienes los suficientes permisos");
//     exit();
// }

$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Usuarios",
        "LINK" => "/aplicacion/usuarios/index.php"
    ],
    [
        "TEXTO" => "modificar Usuario",
        "LINK" => "/aplicacion/usuarios/modificarUsuario.php"
    ],
];
$cod = $_GET["codUsu"];
$consulta = null;
$filas = [];

if ($cod != null && $cod != 0) {
    $sentSelect = "*";
    $sentFrom = "usuarios";
    $sentWhere = "cod_usuario = $cod";

    //construyo la sentencia
    $sentencia = "SELECT $sentSelect " .
        "FROM $sentFrom" .
        " Where $sentWhere";
    $consulta = $bd->query($sentencia);
    if (!$consulta) {
        paginaError("No hay ninguna consulta");
        exit;
    }

    if ($consulta->num_rows == 0) {
        paginaError("No hay ningun usuario con ese codigo");
        exit;
    }

    $usuario = $bd->query($sentencia)->fetch_assoc();
}

$valores = [
    "nombre" => "",
    "nif" => "",
    "direccion" => "",
    "poblacion" => "",
    "provincia" => "",
    "CP" => "",
    "fecha_nacimiento" => "",
    "foto" => ""
];
$errores = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!validaCadena($_POST["nombre"], 50, "") || $_POST["nombre"] == "") {
        $errores[] = "Nombre no válido";
    } else {
        $valores["nombre"] = $_POST["nombre"];
    }
    if (!validaExpresion($_POST["nif"], "/^\d{8}[A-Za-z]$/", "") || $_POST["nif"] == "") {
        $errores[] = "NIF no válido";
    } else {
        $valores["nif"] = $_POST["nif"];
    }
    if (!validaCadena($_POST["direccion"], 50, "") || $_POST["direccion"] == "") {
        $errores[] = "Dirección no válida";
    } else {
        $valores["direccion"] = $_POST["direccion"];
    }
    if (!validaCadena($_POST["poblacion"], 30, "") || $_POST["poblacion"] == "") {
        $errores[] = "Población no válida";
    } else {
        $valores["poblacion"] = $_POST["poblacion"];
    }
    if (!validaCadena($_POST["provincia"], 30, "") || $_POST["provincia"] == "") {
        $errores[] = "Provincia no válida";
    } else {
        $valores["provincia"] = $_POST["provincia"];
    }
    if (empty($_POST["fecha_nacimiento"])) {
        $errores[] = "Fecha Nacimiento no válida";
    } else {
        $valores["fecha_nacimiento"] = $_POST["fecha_nacimiento"];
    }
    if (!validaCadena($_POST["CP"], 5, "") || $_POST["CP"] == "") {
        $errores[] = "CP no válido";
    } else {
        $valores["CP"] = $_POST["CP"];
    }
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === 0) {
        $valores["foto"] = $_FILES["foto"]["name"];
    } else {
        $valores["foto"] = "descarga.jpg";
    }
    if (empty($errores)) {
        $sentencia = "UPDATE usuarios " .
            "SET nombre = '{$valores['nombre']}',
                nif = '{$valores['nif']}',
                direccion = '{$valores['direccion']}',
                poblacion = '{$valores['poblacion']}',
                provincia = '{$valores['provincia']}',
                CP = '{$valores['CP']}',
                fecha_nacimiento = '{$valores['fecha_nacimiento']}',
                foto = '{$valores['foto']}'" .
            " Where cod_usuario = $cod";
        $bd->query($sentencia);
        header("Location: verUsuario.php?codUsu=$cod");
    }
}


// VISTA
inicioCabecera("modificar Usuario");
cabecera();
finCabecera();

inicioCuerpo("modificar Usuario", $barraUbi);
cuerpo($cod, $usuario, $valores, $errores);
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo($cod, $usuario, $valores, $errores)
{

?>

    <?php
    ?>
    <br>
    <form action="modificarUsuario.php?codUsu=<?= $cod ?>" method="post" enctype="multipart/form-data">
        <label>Introduce el nick
            <input type="text" readonly name="nick" value="<?php echo $usuario["nick"] ?>">
        </label>
        <br>
        <label>Introduce el nombre
            <input type="text" name="nombre" value="<?= empty($valores["nombre"]) ? $usuario["nombre"] : $valores["nombre"] ?>">
        </label>
        <br>
        <label>Introduce el nif
            <input type="text" name="nif" value="<?= empty($valores["nif"]) ? $usuario["nif"] : $valores["nif"] ?>">
        </label>
        <br>
        <label>Introduce la direccion
            <input type="text" name="direccion" value="<?= empty($valores["direccion"]) ? $usuario["direccion"] : $valores["direccion"] ?>">
        </label>
        <br>
        <label>Introduce la poblacion
            <input type="text" name="poblacion" value="<?= empty($valores["poblacion"]) ? $usuario["poblacion"] : $valores["poblacion"] ?>">
        </label>
        <br>
        <label>Introduce la provincia
            <input type="text" name="provincia" value="<?= empty($valores["provincia"]) ? $usuario["provincia"] : $valores["provincia"] ?>">
        </label>
        <br>
        <label>Introduce el CP
            <input type="text" name="CP" value="<?= empty($valores["CP"]) ? $usuario["CP"] : $valores["CP"] ?>">
        </label>
        <br>
        <label>Introduce la fecha de nacimiento
            <input type="date" name="fecha_nacimiento" value="<?= empty($valores["fecha_nacimiento"]) ? $usuario["fecha_nacimiento"] : $valores["fecha_nacimiento"] ?>">
        </label>
        <br>
        <label>Introduce la url foto
            <input type="file" name="foto">
        </label> <br>
        <?php
        if (!empty($errores)) {
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li style='color: red;'>$error</li>";
            }
            echo "</ul>";
        }
        ?>
        <br>
        <button type="submit" name="enviar">modificar</button><br>
        <br>
        <a href='index.php'>volver</a>
        <a href='verUsuario.php?codUsu' ?>verUsuario</a>
    </form>
    <?php

    ?>

<?php
}

function mostrarResumen() {}
