<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

if (isset($VAriables)) {
    $VAr++;
}
unset($VAr);

$num = mt_rand(1, 10);
$nombre = 'profesor';
$apellido = "2daw";
$var = "nombre";

if ($num <= 5)
    $var = "nombre";
else
    $var = "apellido";
$resultado = $$var;
$var = 12;
if (gettype($var) == "integer")
    $resultado = "es entero";
$var = "esto es una cadena";
if (gettype($var) == "integer") {
    $resultado = "es entero";
}
$num = 0x1485;
$num = 1234567890123456789;

$num = 12;
$num = (float)$num;
settype($num, "string");
$num = intval($num);

if ($num)
    $num = 0;

if ($num)
    $num = 12;

$cadena = "";
if ($cadena)
    $num = 24;
$resultado = $num + "12hola";
// $resultado = $num + "hola12";
// $resultado = $num + "hola";
7+
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRUEBA");
cabecera();
finCabecera();

inicioCuerpo("APLICACION PRUEBA");
cuerpo(); //llamo a la vista
finCuerpo();



// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo()
{
?>

    estas en pruebas basicas
<?php
    echo "<br>escrito desde php" . PHP_EOL;
    echo "<br>otra linea";
    echo "el host de llamada " . $_SERVER["HTTP_HOST"] . "usando el navegador " . $_SERVER["HTTP_USER_AGENT"] . "<br>" . PHP_EOL;
}
