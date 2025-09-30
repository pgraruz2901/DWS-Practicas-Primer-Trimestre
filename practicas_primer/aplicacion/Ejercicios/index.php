<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

inicioCabecera("Ejercicios");
cabecera();
finCabecera();

inicioCuerpo("Ejercicios");
cuerpo(); //llamo a la vista   
finCuerpo();
function cabecera(){

}
function cuerpo(){
    ?>
    <ul>
        <li><a href="T1/ejercicio1.php">Ejercicio 1</a></li>
        <li><a href="T1/ejercicio2.php">Ejercicio 2</a></li>
        <li><a href="T1/ejercicio3.php">Ejercicio 3</a></li>
    </ul>
    <?php
}