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
        "TEXTO" => "ver Usuario",
        "LINK" => "/aplicacion/usuarios/verUsuario.php"
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





// VISTA
inicioCabecera("verUsuario");
cabecera();
finCabecera();

inicioCuerpo("verUsuario", $barraUbi);
cuerpo($usuario);
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo($usuario)
{

?>

    <?php
    ?>
    <br>
    <form action="nuevoUsuario.php" method="post" enctype="multipart/form-data">

        <label>Introduce el Nick
            <input type="text" name="nick" readonly value="<?php echo $usuario["nick"] ?>">
        </label>
        <br>
        <label>Introduce el nombre
            <input type="text" name="nombre" readonly value="<?php echo $usuario["nombre"] ?>">
        </label>
        <br>
        <label>Introduce el nif
            <input type="text" name="nif" readonly value="<?php echo $usuario["nif"] ?>">
        </label>
        <br>
        <label>Introduce la direccion
            <input type="text" name="direccion" readonly value="<?php echo $usuario["direccion"] ?> ">
        </label>
        <br>
        <label>Introduce la poblacion
            <input type="text" name="poblacion" readonly value="<?php echo $usuario["poblacion"] ?>">
        </label>
        <br>
        <label>Introduce la provincia
            <input type="text" name="provincia" readonly value="<?php echo $usuario["provincia"] ?>">
        </label>
        <br>
        <label>Introduce el CP
            <input type="text" name="CP" readonly value="<?php echo $usuario["CP"] ?>">
        </label>
        <br>
        <label>Introduce la fecha de nacimiento
            <input type="date" name="fecha_nacimiento" readonly value="<?php echo $usuario["fecha_nacimiento"] ?>">
        </label>
        <br>
        <img src="/imagenes/<?php echo $usuario["foto"] ?>">
        <br>
        <a href='index.php'>volver</a>
        <a href='modificarUsuario.php?codUsu=<?= $usuario["cod_usuario"] ?>'>modificar</a>
        <a href=''>borrar</a>
    </form>
    <?php


    ?>

<?php
}

function mostrarResumen() {}
