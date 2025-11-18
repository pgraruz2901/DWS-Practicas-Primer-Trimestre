<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador

$contadorUsu = 0;
if (isset($_COOKIE["visitas"])) {
    $contadorUsu = $_COOKIE["visitas"] + 1;
} else {
    $contadorUsu = 1;
}

setcookie("visitas", $contadorUsu, time() +  2 * 24 * 3600, "/");
//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRUEBA");
cabecera();
finCabecera();
inicioCuerpo("APLICACION PRUEBA");
cuerpo($contadorUsu); //llamo a la vista
finCuerpo();



// **********************************************************

//vista
function cabecera() {}

//vista
function cuerpo($contadorUsu)
{

    echo " Estas son las veces que se ha accedido a la pagina ";
    echo $contadorUsu;
}
