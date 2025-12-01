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
        "TEXTO" => "Nuevo Usuario",
        "LINK" => "/aplicacion/usuarios/nuevoUsuario.php"
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
$foto = "";
$borrado = 0;
$valores = [];
$errores = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!validaCadena($_POST["nick"], 50, "") || $_POST["nick"] == "") {
        $errores[] = "Nick no válido";
    } else {
        $nick = $_POST["nick"];
    }
    if (!validaCadena($_POST["nombre"], 50, "") || $_POST["nombre"] == "") {
        $errores[] = "Nombre no válido";
    } else {
        $nombre = $_POST["nombre"];
    }
    if (!validaExpresion($_POST["nif"], "/^\d{8}[A-Za-z]$/", "") || $_POST["nif"] == "") {
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
    if (empty($_POST["fecha_nacimiento"])) {
        $errores[] = "Fecha Nacimiento no válida";
    } else {
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
    }
    if (!validaCadena($_POST["CP"], 5, "") || $_POST["CP"] == "") {
        $errores[] = "CP no válido";
    } else {
        $CP = $_POST["CP"];
    }
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === 0) {
        $foto = $_FILES["foto"]["name"];
    } else {
        $foto = "descarga.jpg";
    }
    if (empty($errores)) {
        $sentencia = "INSERT INTO usuarios (nick, nombre, nif, direccion, poblacion, provincia, CP, fecha_nacimiento, borrado, foto) 
        VALUES ('$nick', '$nombre', '$nif', '$direccion', '$poblacion', '$provincia', '$CP', '$fecha_nacimiento',   $borrado, '$foto')";
        $bd->query($sentencia);
        $sentenciaCod = "SELECT cod_usuario FROM usuarios WHERE nick = '$nick'";
        $usuario = $bd->query($sentenciaCod)->fetch_assoc();
        $codigoUsu = $bd->query($sentenciaCod)->fetch_assoc()["cod_usuario"];
        header("Location: verUsuario.php?codUsu=$codigoUsu");
    }
}

// VISTA
inicioCabecera("nuevoUsuario");
cabecera();
finCabecera();

inicioCuerpo("nuevoUsuario", $barraUbi);
cuerpo($errores, $usuario);
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo($errores, $usuario)
{

?>
    <h1>Crear nuevo usuario</h1>

    <form action="nuevoUsuario.php" method="post" enctype="multipart/form-data">

        <label>Introduce el Nick
            <input type="text" name="nick" value="<?php echo $usuario["nick"] ?>">
        </label>
        <br>
        <label>Introduce el nombre
            <input type="text" name="nombre" value="<?php echo $usuario["nombre"] ?>">
        </label>
        <br>
        <label>Introduce el nif
            <input type="text" name="nif" value="<?php echo $usuario["nif"] ?>">
        </label>
        <br>
        <label>Introduce la direccion
            <input type="text" name="direccion" value="<?php echo $usuario["direccion"] ?> ">
        </label>
        <br>
        <label>Introduce la poblacion
            <input type="text" name="poblacion" value="<?php echo $usuario["poblacion"] ?>">
        </label>
        <br>
        <label>Introduce la provincia
            <input type="text" name="provincia" value="<?php echo $usuario["provincia"] ?>">
        </label>
        <br>
        <label>Introduce el CP
            <input type="text" name="CP" value="<?php echo $usuario["CP"] ?>">
        </label>
        <br>
        <label>Introduce la fecha de nacimiento
            <input type="date" name="fecha_nacimiento" value="<?php echo $usuario["fecha_nacimiento"] ?>">
        </label>
        <br>
        <label>Introduce la url foto
            <input type="file" name="foto">
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
    <a href="index.php">Volver al index</a>
<?php
}

function mostrarResumen() {}
