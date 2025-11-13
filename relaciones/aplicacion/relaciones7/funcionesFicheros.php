<?php

/**
 * funcion para escribir en un fichero
 * @param string $nombre nombre del fichero
 * @param mixed $datos valores
 * @return bool devuelve si ejecuta correctamente o hay algún error
 */
function escribirAichero(string $nombre, array $datos): bool
{
    //ruta en la que se guardará el fichero
    $ruta = $_SERVER["DOCUMENT_ROOT"] . "/temp";
    //si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);
    $ruta .= $nombre;
    //se abre el fichero para escritura
    //si existe se borra el contenido
    $fic = fopen($ruta, "w");
    if (!$fic)
        return false;
    //se recorre el array con los datos
    foreach ($datos as $fila) {
        $linea = "";
        foreach ($fila as $columna) {
            $linea .= $columna . ",";
        }
        $linea .= "\r\n";
        //se escribe en el fichero una linea
        fputs($fic, $linea);
    }
    //se cierra el fichero
    fclose($fic);
    return true;
}
/**
 * funcion para leer de un fichero
 * @paramstring $nombre nombre del fichero
 * @parammixed $datos valores
 * @returnbool devuelve si ejecuta correctamente o hay algún error
 */
function leerDeFichero(string $nombre, array &$datos): bool
{
    //ruta en la que se guardará el fichero
    $ruta = $_SERVER["DOCUMENT_ROOT"] . "/temp";
    //si no existe la ruta se crea
    if (!file_exists($ruta))
        mkdir($ruta);
    $ruta .= $nombre;
    //se abre el fichero para lectura
    //debe existir
    $fic = fopen($ruta, "r");
    if (!$fic)
        return false;
    //borro el contenido del array
    foreach ($datos as $pos => $valor) {
        unset($datos[$pos]);
    }
    //leo el fichero linea a linea
    while ($linea = fgets($fic)) {
        $linea = str_replace("\r", "", $linea);
        $linea = str_replace("\n", "", $linea);
        if ($linea != "") {
            $linea = explode(",", $linea);
            $datos[] = $linea;
        }
    }
    //se cierra el fichero
    fclose($fic);
    return true;
}
