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
        "TEXTO" => "Nuevo Usuario",
        "LINK" => "/aplicacion/usuario/nuevoUsuario.php"
    ],
];

$nick = "";
$nombre = "";
$nif = "";
$direccion = "";
$poblacion = "";
$provincia = "";
$CP = "";
$fecha_nacimiento = "";
$borrado = 0;
$foto = "";
$valores = [];
$errores = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!validaCadena($_POST["Nick"], 50, "") || $_POST["Nick"] == "") {
        $errores[] = "Nick no válido";
    } else {
        $nick = $_POST["Nick"];
    }
    if (!validaCadena($_POST["nombre"], 50, "") || $_POST["nombre"] == "") {
        $errores[] = "Nombre no válido";
    } else {
        $nombre = $_POST["nombre"];
    }
    if (!validaCadena($_POST["nif"], 10, "") || $_POST["nif"] == "") {
        $errores[] = "NIF no válido";
    } else {
        $nif = $_POST["nif"];
    }
    if (!validaCadena($_POST["direccion"], 50, "") || $_POST["direccion"] == "") {
        $errores[] = "Dirección no válida";
    } else {
        $direccion = $_POST["direccion"];
    }
    if (!validaCadena($_POST["poblacion"], 30, "") || $_POST["poblacion"] == "") {
        $errores[] = "Población no válida";
    } else {
        $poblacion = $_POST["poblacion"];
    }
    if (!validaCadena($_POST["provincia"], 30, "") || $_POST["provincia"] == "") {
        $errores[] = "Provincia no válida";
    } else {
        $provincia = $_POST["provincia"];
    }
    if (!validaCadena($_POST["CP"], 5, "") || $_POST["CP"] == "") {
        $errores[] = "CP no válido";
    } else {
        $CP = $_POST["CP"];
    }
    if (!validaCadena($_POST["foto"], 50, "") || $_POST["foto"] == "") {
        $errores[] = "Foto no válida";
    } else {
        $foto = $_POST["foto"];
    }
    if (empty($errores)) {
        $sentencia = "INSERT INTO usuarios (Nick, nombre, nif, direccion, poblacion, provincia, CP, fecha_nacimiento, borrado, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert = $bd->prepare($sentencia);
        $insert->bind_param(
            $valores["Nick"],
            $valores["nombre"],
            $valores["nif"],
            $valores["direccion"],
            $valores["poblacion"],
            $valores["provincia"],
            $valores["CP"],
            $valores["fecha_nacimiento"],
            $valores["borrado"],
            $valores["foto"]
        );
        if ($insert->execute()) {
            header("Location: verUsuario.php");
        } else {
            paginaError("Error al insertar el usuario en la base de datos");
        }
    }
}

// VISTA
inicioCabecera("nuevoUsuario");
cabecera();
finCabecera();

inicioCuerpo("nuevoUsuario", $barraUbi);
cuerpo($errores);
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo($errores)
{

?>
    <h1>Crear nuevo usuario</h1>

    <form action="nuevoUsuario.php" method="post">

        <label>Introduce el Nick
            <input type="text" name="Nick" value="<?php echo htmlspecialchars($_POST["Nick"] ?? '') ?>">
        </label>
        <br>
        <label>Introduce el nombre
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($_POST["nombre"] ?? '') ?>">
        </label>
        <br>
        <label>Introduce el nif
            <input type="text" name="nif" value="<?php echo htmlspecialchars($_POST["nif"] ?? '') ?>">
        </label>
        <br>
        <label>Introduce la direccion
            <input type="text" name="direccion" value="<?php echo htmlspecialchars($_POST["direccion"] ?? '') ?> ">
        </label>
        <br>
        <label>Introduce la poblacion
            <input type="text" name="poblacion" value="<?php echo htmlspecialchars($_POST["poblacion"] ?? '') ?>">
        </label>
        <br>
        <label>Introduce la provincia
            <input type="text" name="provincia" value="<?php echo htmlspecialchars($_POST["provincia"] ?? '') ?>">
        </label>
        <br>
        <label>Introduce el CP
            <input type="text" name="CP" value="<?php echo htmlspecialchars($_POST["CP"] ?? '') ?>">
        </label>
        <br>
        <label>Introduce la fecha de nacimiento
            <input type="date" name="fecha_nacimiento" value="<?php echo htmlspecialchars($_POST["fecha_nacimiento"] ?? '') ?>">
        </label>
        <br>
        <label>Introduce la url foto
            <input type="file" name="foto" value="<?php echo htmlspecialchars($_POST["foto"] ?? '') ?>">
        </label>
        <br>
        <?php
        if (!empty($errores)) {
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li style='color: red;'>$error</li>";
            }
            echo "</ul>";
        }
        ?>
        <button type="submit" name="enviar">Agregar Usuario</button>
    </form>

    <br>
    <a href="index.php">Volve al index</a>
<?php
}

function mostrarResumen() {}
