<?php
include __DIR__ . "/../../scripts/clases/Punto.php";
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");

// Creamos algunos puntos de prueba
$PUNTOS = [
    new Punto(50, 50, 'red', 3),
    new Punto(100, 100, 'blue', 1),
];

// Ruta de la imagen de prueba
$nombreImagen = __DIR__ . "/imagenes/puntos/test.jpg";

function crearImagen($nombreImagen, $PUNTOS) {
    $width = 400;
    $height = 300;
    $imagen = imagecreatetruecolor($width, $height);

    // Fondo blanco
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    imagefill($imagen, 0, 0, $blanco);

    // Marco negro
    $negro = imagecolorallocate($imagen, 0,0,0);
    imagerectangle($imagen, 0,0,$width-1,$height-1,$negro);

    // Dibujar puntos
    foreach ($PUNTOS as $punto) {
    $x = $punto->getX();
    $y = $punto->getY();
    $grosor = $punto->getGrosor();
    $infoColor = Punto::COLORES[$punto->getColor()] ?? ['rgb' => [0,0,0]];
    $color = imagecolorallocate($imagen, $infoColor['rgb'][0], $infoColor['rgb'][1], $infoColor['rgb'][2]);
    
    imagefilledrectangle(
        $imagen,
        $x - $grosor,
        $y - $grosor,
        $x + $grosor,
        $y + $grosor,
        $color
    );
}


    // Guardar imagen
    imagejpeg($imagen, $nombreImagen);
    imagedestroy($imagen);
}

// Crear la imagen
crearImagen($nombreImagen, $PUNTOS);

// Mostrarla en el navegador
echo "<img src='imagenes/puntos/test.jpg?" . time() . "'>";
