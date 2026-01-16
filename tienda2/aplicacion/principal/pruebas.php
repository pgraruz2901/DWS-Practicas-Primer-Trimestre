<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Pruebas",
        "LINK" => "/aplicacion/principal/pruebas.php"
    ]
];

// ----- CONTROLADOR -----
$datos = [];

try {
    // Crear muebles tradicionales
    $mueble1 = new MuebleTradicional("Taburete", null, null, null, null, null, 1, 120.5, 20, "S02");
    $mueble1->añadir("color", "negro", "altura", 100, "ancho", 500);
    $mueble1->añadir("material", "cuero");
    $datos[] = $mueble1;

    $mueble2 = new MuebleTradicional("Escritorio", null, null, null, null, null, 2, 350.75, 80, "S05");
    $mueble2->añadir("color", "carne");
    $datos[] = $mueble2;

    // Crear muebles reciclados
    $mueble3 = new MuebleReciclado(
        "Mesa reciclada",
        "Fabricante1",
        "ESPAÑA",
        2022,
        "01/12/2021",
        "16/07/2050",
        1,
        100.5,
        50
    );
    $mueble3->añadir("color", "negra");
    $datos[] = $mueble3;

    $mueble4 = new MuebleReciclado(
        "Mesilla de noche",
        "Fabricante 2",
        "ESPAÑA",
        2021,
        "01/01/2020",
        "26/08/2045",
        2,
        60.9,
        85
    );
    $mueble4->añadir("color", "gris", "reciclado", true);
    $datos[] = $mueble4;

    // Probar método puedeCrear
    $restantes = 0;
    $puede = $mueble4->puedeCrear($restantes);
    $datos['puedeCrear'] = [
        'resultado' => $puede ? 'Sí' : 'No',
        'restantes' => $restantes
    ];

    // Probar damePropiedad
    $valor = "";
    if ($mueble1->damePropiedad("nombre", 1, $valor)) {
        $datos['propiedad'] = "El nombre del primer mueble es: " . $valor;
    }
} catch (Exception $e) {
    $datos['error'] = $e->getMessage();
}

// ----- VISTA -----
inicioCabecera("2DAW APLICACION");
cabecera();
finCabecera();

inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($datos);
finCuerpo();

// **********************************************************

function cabecera() {}

function cuerpo($datos)
{
?>
    <p>Pruebas</p>

    <?php if (isset($datos['error'])): ?>
        <p style="color:red;">Error: <?= htmlspecialchars($datos['error']) ?></p>
    <?php endif; ?>

    <p>Objetos</p>
    <pre>
<?php
    foreach ($datos as $d) {
        if ($d instanceof MuebleBase) {
            echo $d . "\n---------------------\n";
        }
    }
?>
    </pre>

    <p>Más resultados:</p>
    <pre>
<?php
    if (isset($datos['puedeCrear'])) {
        echo "¿Se pueden crear más muebles? " . $datos['puedeCrear']['resultado'] . "\n";
        echo "Restantes: " . $datos['puedeCrear']['restantes'] . "\n";
    }

    if (isset($datos['propiedad'])) {
        echo $datos['propiedad'] . "\n";
    }
?>
    </pre>
<?php
}
?>