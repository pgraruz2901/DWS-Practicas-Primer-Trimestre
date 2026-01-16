<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador



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
    <ul>

        <li><a href="/aplicacion/pruebas/sintaxisBasica.php">Sintaxis Basica</a></li>
    </ul>
    estas en pruebas
<?php

}
