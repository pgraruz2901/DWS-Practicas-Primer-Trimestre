<?php
// /scripts/class/curso2025/datos.php
include_once(dirname(__FILE__) . "/../../../cabecera.php");

function obtenerMuebles(): array
{
    $muebles = [];

    // Usamos índices desde 1
    $muebles[1] = new MuebleTradicional("Silla clásica", null, null, null, null, null, 1, 120.5, 50, "S01");
    $muebles[1]->añadir("color", "marrón", "material", "madera");

    $muebles[2] = new MuebleTradicional("Mesa comedor", null, null, null, null, null, 2, 300.0, 100, "S02");
    $muebles[2]->añadir("color", "blanca", "patas", 4);

    $muebles[3] = new MuebleReciclado("Banco reciclado", 3, 80.75, "EcoMuebles", "España", 2022, "01/02/2023", "01/02/2050", 50.0);
    $muebles[3]->añadir("material", "palets", "color", "natural");

    $muebles[4] = new MuebleReciclado("Estantería eco", 4, 150.0, "GreenCraft", "España", 2020, "10/05/2020", "10/05/2045", 75.0);
    $muebles[4]->añadir("color", "gris", "altura", 180);

    $muebles[5] = new MuebleTradicional("Cómoda vintage", null, null, null, null, null, 5, 250.0, 60, "S03");
    $muebles[5]->añadir("color", "beige", "tamaño", "grande");

    return $muebles;
}
