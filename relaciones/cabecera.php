<?php
include_once(dirname(__FILE__) . "/scripts/librerias/validacion.php");

define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO", "desarrollo"); //en "produccion o en desarrollo

spl_autoload_register(function ($nombreClase) {
    include __DIR__ . "/scripts/clases/" . $nombreClase . ".php";
});


if (MODO_TRABAJO == "produccion")
    error_reporting(0);
else
    error_reporting(E_ALL);


spl_autoload_register(function ($clase) {
    $ruta = RUTABASE . "/scripts/clases/";
    $fichero = $ruta . "$clase.php";

    if (file_exists($fichero)) {
        require_once($fichero);
    } else {
        throw new Exception("La clase $clase no se ha encontrado.");
    }
});


include(RUTABASE . "/aplicacion/plantilla/plantilla.php");
include(RUTABASE . "/aplicacion/config/acceso_bd.php");

$PUNTOS = [];


//Fichero

// Sacamos la IP y limpiamos
$ip = $_SERVER["REMOTE_ADDR"];
$nombreIP = preg_replace('/[^A-Za-z0-9]/', '_', $ip);

// Sacamos el navegador y limpiamos
$navegador = $_SERVER["HTTP_USER_AGENT"];
$arrayNav = explode("/", $navegador);
$nombreNavegador = isset($arrayNav[2]) ? $arrayNav[2] : "desconocido";
$array = explode(")", $nombreNavegador);
$nombreNavegador = isset($array[1]) ? $array[1] : $nombreNavegador;
$nombreNavegador = preg_replace('/[^A-Za-z0-9_\-]/', '_', $nombreNavegador);

// Creamos el archivo
$nFichero = RUTABASE . "/aplicacion/relaciones7/puntos/puntos_" . $nombreIP . "_" . $nombreNavegador . ".dat";

// Carpeta donde se guardará la imagen
$dirImagenes = RUTABASE . '/imagenes/puntos';
if (!is_dir($dirImagenes)) mkdir($dirImagenes, 0777, true);

$nombreImagen = $dirImagenes . "/imagen_" . $nombreIP . "_" . $nombreNavegador . ".jpg";

$archivoPersonal = $nombreIP . "_" . $nombreNavegador;
 
function cargaPuntos($ARCHIVO_PUNTOS, &$PUNTOS)
{
    if (!file_exists($ARCHIVO_PUNTOS)) {
        file_put_contents($ARCHIVO_PUNTOS, "");
        return;
    }

    $fich = fopen($ARCHIVO_PUNTOS, "r");
    $PUNTOS = [];


    if ($fich !== false) {
        while ($linea = fgets($fich)) {
            $partes = explode(';', $linea);
            if (count($partes) === 4) {
                try {
                    $x = intval(trim($partes[0]));
                    $y = intval(trim($partes[1]));
                    $color = trim($partes[2]);
                    $grosor = intval(trim($partes[3]));
                    $punto = new Punto($x, $y, $color, $grosor);
                    $PUNTOS[] = $punto;
                } catch (Exception $e) {
                    // Ignorar líneas inválidas
                }
            }
        }

        fclose($fich);
    }

}

cargaPuntos($nFichero, $PUNTOS);
    
function crearImagen($nombreImagen, $PUNTOS) {
    $imageSize = 500;
    $imagen = imagecreatetruecolor($imageSize, $imageSize);

    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    imagefill($imagen, 0, 0, $blanco);

    $negro = imagecolorallocate($imagen, 0, 0, 0);
    imagerectangle($imagen, 0, 0, $imageSize - 1, $imageSize - 1, $negro);

    foreach ($PUNTOS as $punto) {
        $colorInfo = Punto::COLORES[$punto->getColor()];
        $color = imagecolorallocate($imagen, $colorInfo['rgb'][0], $colorInfo['rgb'][1], $colorInfo['rgb'][2]);

        $x = $punto->getX();
        $y = $punto->getY();
        $grosor = max(3, $punto->getGrosor() * 4);
        $half = (int) floor($grosor / 2);

        imagefilledrectangle($imagen, $x - $half, $y - $half, $x + $half, $y + $half, $color);
    }

    imagepng($imagen, $nombreImagen);
    imagedestroy($imagen);
}




