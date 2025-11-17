<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

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
    header("Content-Type: image/jpeg");
    header("Content-Disposition: attachment; filename=\"puntos_{$ip}_{$navegador}.jpg\"");


    imagepng($imagen);
    imagedestroy($imagen);
    exit;
    