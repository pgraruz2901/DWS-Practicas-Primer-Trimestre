<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
include_once(dirname(__FILE__) . "/formulario.php");

// Inicializaciones

$datos = [
    "nombre" => "",
    "contraseña" => "",
    "fechaNac" => "",
    "diaCarnet" => "",
    "mesCarnet" => "",
    "anioCarnet" => "",
    "horaLevantarse" => "",
    "estado" => "",
    "hermanos" => 0,
    "sueldo" => 1100
];

$errores = [];
// controlador

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // nombre
    $nombre = trim($_POST["nombre"] ?? "");
    if (!validaCadena($nombre, 25, "")) {
        $errores["nombre"][] = "El nombre no puede tener más de 25 caracteres.";
    } elseif ($nombre === "") {
        $errores["nombre"][] = "Debe indicarse un nombre.";
    } elseif (preg_match('/^h/i', $nombre)) {
        $errores["nombre"][] = "El nombre no puede comenzar por H.";
    } else {
        $nombre = strtoupper($nombre);
    }
    $datos["nombre"] = $nombre;

    // contraseña
    $password = $_POST["contraseña"] ?? "";
    if (!validaExpresion($password, '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\$_\-;<>@]).{8,15}$/', "")) {
        $errores["contraseña"][] = "La contraseña no cumple los requisitos.";
    }
    $datos["contraseña"] = $password;

    // fecha nacimiento
    $fechaNac = trim($_POST["fechaNac"] ?? "");
    if (!validaFecha($fechaNac, "")) {
        $errores["fechaNac"][] = "Debe introducir una fecha de nacimiento válida (d/m/Y).";
    }
    $datos["fechaNac"] = is_object($fechaNac) ? $fechaNac->format('d-m-Y') : $fechaNac;

    // fecha carnet
    $diaCarnet = intval($_POST["diaCarnet"] ?? 0);
    $mesCarnet = intval($_POST["mesCarnet"] ?? 0);
    $anioCarnet = intval($_POST["anioCarnet"] ?? 0);
    $fechaCarnetStr = sprintf("%02d/%02d/%04d", $diaCarnet, $mesCarnet, $anioCarnet);

    if (!validaFecha($fechaCarnetStr, "")) {
        $errores["fechaCarnet"][] = "La fecha de carnet no es válida.";
    } else {
        $fechaCarnet = new DateTime("$anioCarnet-$mesCarnet-$diaCarnet");
        if (is_object($fechaNac)) {
            $mayorEdad = clone $fechaNac;
            $mayorEdad->modify('+18 years');
            if ($fechaCarnet < $mayorEdad) {
                $errores["fechaCarnet"][] = "La fecha del carnet debe ser posterior a cumplir los 18 años.";
            }
        }
    }
    $datos["diaCarnet"] = $diaCarnet;
    $datos["mesCarnet"] = $mesCarnet;
    $datos["anioCarnet"] = $anioCarnet;

    // hora levantarse
    $hora = trim($_POST["horaLevantarse"] ?? "");
    if (!validaHora($hora, "")) {
        $errores["horaLevantarse"][] = "Debe introducir una hora válida (H:i:s).";
    } else {
        $hora = is_object($hora) ? $hora->format('H:i') : $hora;
    }
    $datos["horaLevantarse"] = $hora;

    // estado
    $estado = intval($_POST["estado"] ?? 0);
    $estadosValidos = array("1", "2", "3", "4");
    if (!in_array($estado, $estadosValidos)) {
        $errores["estado"][] = "Debe seleccionar un estado válido.";
    }
    $datos["estado"] = $estado;

    // estudios
    $estudios = $_POST["estudios"] ?? [];
    $estudiosValidos = ["0", "1", "2", "3", "4", "5"];
    if (empty($estudios)) {
        $errores["estudios"][] = "Debe seleccionar al menos un nivel de estudios.";
    } else {
        foreach ($estudios as $e) {
            if (!in_array($e, $estudiosValidos)) {
                $errores["estudios"][] = "Alguna opción de estudios no es válida.";
            }
        }
        if (in_array(0, $estudios) && count($estudios) > 1) {
            $errores["estudios"][] = "Si marca 'Sin estudios', no puede marcar ninguna otra opción.";
        }
    }
    $datos["estudios"] = $estudios;

    // hermanos
    $hermanos = intval($_POST["hermanos"] ?? 0);
    if (!validaEntero($hermanos, 0, 20, 0)) {
        $errores["hermanos"][] = "El número de hermanos debe estar entre 0 y 20.";
    }
    $datos["hermanos"] = $hermanos;

    // sueldo
    $sueldo = floatval($_POST["sueldo"] ?? 1100);
    if (!validaReal($sueldo, 1000, 150000, 1100)) {
        $errores["sueldo"][] = "El sueldo debe estar entre 1000 y 150000 €.";
    }
    $datos["sueldo"] = $sueldo;

    // resultado
    if (empty($errores)) {
        mostrarResumen($datos, $estadosValidos);
        exit;
    }
}

// -----------------------------------------------------------
// VISTA
// -----------------------------------------------------------
inicioCabecera("Relacion5");
cabecera();
finCabecera();

inicioCuerpo("Relacion5");
cuerpo($datos, $errores);
finCuerpo();


function cabecera() {}

function cuerpo($datos, $errores)
{
    formulario($datos, $errores);
}

// Mostrar datos
function mostrarResumen($datos, $estadosValidos)
{
    echo "<h2>Datos correctos:</h2><ul>";
    echo "<li><strong>Nombre:</strong> {$datos['nombre']}</li>";
    echo "<li><strong>Contraseña:</strong> ******</li>";
    echo "<li><strong>Fecha Nacimiento:</strong> {$datos['fechaNac']}</li>";
    echo "<li><strong>Fecha Carnet:</strong> {$datos['diaCarnet']}-{$datos['mesCarnet']}-{$datos['anioCarnet']}</li>";
    echo "<li><strong>Hora de levantarse:</strong> {$datos['horaLevantarse']}</li>";
    echo "<li><strong>Estado:</strong> {$estadosValidos[$datos['estado']]}</li>";
    echo "<li><strong>Estudios:</strong> " . implode(", ", $datos["estudios"]) . "</li>";
    echo "<li><strong>Hermanos:</strong> {$datos['hermanos']}</li>";
    echo "<li><strong>Sueldo:</strong> {$datos['sueldo']} €</li>";
    echo "</ul>";
}
?>
