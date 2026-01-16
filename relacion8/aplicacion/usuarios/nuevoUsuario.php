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
        "LINK" => "/aplicacion/usuarios/nuevoUsuario.php"
    ],
];

$nick = "";
$nombre = "";
$contraseña = "";
$nif = "";
$direccion = "";
$poblacion = "";
$provincia = "";
$CP = "";
$fecha_nacimiento = "";
$foto = "";
$rol = 0;
$borrado = 0;



$valores = [
    "nick" => "",
    "nombre" => "",
    "nif" => "",
    "contraseña" => "",
    "direccion" => "",
    "poblacion" => "",
    "provincia" => "",
    "CP" => "",
    "fecha_nacimiento" => "",
    "rol" => ""
];
$errores = [];

$roles = $ACLBD->dameRoles();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!validaCadena($_POST["nick"], 50, "") || $_POST["nick"] == "") {
        $errores[] = "Nick no válido";
    } else {
        $valores["nick"] = $_POST["nick"];
        $nick = $_POST["nick"];
    }
    if (!validaCadena($_POST["nombre"], 50, "") || $_POST["nombre"] == "") {
        $errores[] = "Nombre no válido";
    } else {
        $valores["nombre"] = $_POST["nombre"];
        $nombre = $_POST["nombre"];
    }

    if($_POST["contra"] !== $_POST["repiteContra"]){
        $errores[] = "Las contraseñas no coinciden";
    }else{
        $valores["contra"] = $_POST["contra"];
        $contraseña = $_POST["contra"];
    }
    if (!validaExpresion($_POST["nif"], "/^\d{8}[A-Za-z]$/", "") || $_POST["nif"] == "") {
        $errores[] = "NIF no válido";
    } else {
        $valores["nif"] = $_POST["nif"];
        $nif = $_POST["nif"];
    }
    if (!validaCadena($_POST["direccion"], 50, "") || $_POST["direccion"] == "") {
        $errores[] = "Dirección no válida";
    } else {
        $valores["direccion"] = $_POST["direccion"];
        $direccion = $_POST["direccion"];
    }
    if (!validaCadena($_POST["poblacion"], 30, "") || $_POST["poblacion"] == "") {
        $errores[] = "Población no válida";
    } else {
        $valores["poblacion"] = $_POST["poblacion"];
        $poblacion = $_POST["poblacion"];
    }
    if (!validaCadena($_POST["provincia"], 30, "") || $_POST["provincia"] == "") {
        $errores[] = "Provincia no válida";
    } else {
        $valores["provincia"] = $_POST["provincia"];
        $provincia = $_POST["provincia"];
    }
    if (empty($_POST["fecha_nacimiento"])) {
        $errores[] = "Fecha Nacimiento no válida";
    } else {
        $valores["fecha_nacimiento"] = $_POST["fecha_nacimiento"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
    }
    if (!validaCadena($_POST["CP"], 5, "") || $_POST["CP"] == "") {
        $errores[] = "CP no válido";
    } else {
        $valores["CP"] = $_POST["CP"];
        $CP = $_POST["CP"];
    }
    $valores["rol"] = $_POST["rol"];
    $rol = $_POST["rol"];

    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === 0) {

    $nombreArchivo = $nombre . "_" . basename($_FILES["foto"]["name"]);
    $rutaDestino = $_SERVER["DOCUMENT_ROOT"] . "/imagenes/" . $nombreArchivo;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaDestino)) {
        $foto = $nombreArchivo;
    } else {
        $errores[] = "Error al subir la imagen";
    }
    }else{
        $foto = "descarga.jpg";
    }

    if (empty($errores)) {
        if($ACLBD->existeUsuario($nick)){
            paginaError("El usuario ya existe");
        }else{
        $ACLBD->anadirUsuario($nombre, $nick, $contraseña, (int)$rol);
        $sentencia = "INSERT INTO usuarios (nick, nombre, nif, direccion, poblacion, provincia, CP, fecha_nacimiento, borrado, foto) 
        VALUES ('$nick', '$nombre', '$nif', '$direccion', '$poblacion', '$provincia', '$CP', '$fecha_nacimiento',   $borrado, '$foto')";
        $bd->query($sentencia);
        $sentenciaCod = "SELECT cod_usuario FROM usuarios WHERE nick = '$nick'";
        $usuario = $bd->query($sentenciaCod)->fetch_assoc();
        $codigoUsu = $usuario["cod_usuario"];

        header("Location: verUsuario.php?codUsu=$codigoUsu");
        }
       
    }
}

// VISTA
inicioCabecera("nuevoUsuario");
cabecera();
finCabecera();

inicioCuerpo("nuevoUsuario", $barraUbi);
cuerpo($errores, $roles,$usuario,  $valores);
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo($errores, $roles, $usuario, $valores)
{

?>
    <h1>Crear nuevo usuario</h1>

    <form action="nuevoUsuario.php" method="post" enctype="multipart/form-data">

        <label>Introduce el Nick
            <input type="text" name="nick" value="<?php echo $valores["nick"] ?>">
        </label>
        <br>
        <label>Introduce el nombre
            <input type="text" name="nombre" value="<?php echo $valores["nombre"] ?>">
        </label>
        <br>
        <label for="contra">Contraseña</label>
        <input type="password" name="contra" >
        <br>
        <label for="repiteContra">Repite la contraseña</label>
        <input type="password" name="repiteContra">
        <br>
        <label>Introduce el nif
            <input type="text" name="nif" value="<?php echo $valores["nif"] ?>">
        </label>
        <br>
        <label>Introduce la direccion
            <input type="text" name="direccion" value="<?php echo $valores["direccion"] ?> ">
        </label>
        <br>
        <label>Introduce la poblacion
            <input type="text" name="poblacion" value="<?php echo $valores["poblacion"] ?>">
        </label>
        <br>
        <label>Introduce la provincia
            <input type="text" name="provincia" value="<?php echo $valores["provincia"] ?>">
        </label>
        <br>
        <label>Introduce el CP
            <input type="text" name="CP" value="<?php echo $valores["CP"] ?>">
        </label>
        <br>
        <label>Introduce la fecha de nacimiento
            <input type="date" name="fecha_nacimiento" value="<?php echo $valores["fecha_nacimiento"] ?>">
        </label>
        <br>
        <label>Introduce la url foto
            <input type="file" name="foto">
        </label>
        <br>
        <label for="rol">Introduce el rol</label>
        <select name="rol">
            <?php
            foreach($roles as $rol => $key){
                ?>
                <option value="<?=$rol?>"><?=$key?></option>
                <?php
            }
            ?>
        </select>
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
