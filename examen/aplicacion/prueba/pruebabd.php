<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");


//localhost, usuario, contraseña, bbdd
$bd = @new mysqli($servidor, $usuario, $contrasenia, $baseDatos);
$bd->set_charset("utf8");

if ($bd->connect_errno) {
    echo paginaError("No se ha podido conectar la base de datos");
    exit;
}
$sentSelect = "*";
$sentFrom = "usuarios";
$sentWhere = "";
$sentOrder = "cadena";

//recojo los criterios de filtrado

$sentWhere = " numero>10";

//construyo la sentencia
$sentencia = "SELECT $sentSelect" .
     " FROM $sentFrom"  ;
    // "WHERE $sentWhere"  .
    // " order by $sentOrder";

$consulta = $bd->query($sentencia);

if (!$consulta) {
    paginaError("No se ha podido conectar la base de datos");
    exit;
}
$fila = [];
while ($fila = $consulta->fetch_assoc()) {
    $fila['descripcion'] = $fila["cadena"] . ":" . $fila["numero"];
    $filas[] = $fila;
}

//ejecucion sentencias borrado/actualizacion/insercion
if (isset($_GET["oper"]) && $_GET["oper"] == 1) {
    //para evitar problemas de inyeccion
    //con tipos  disintos de cadena, convertir siempre
    //el parametro recibo al tipo

    $id="2";
    $id=intval($id);

    //para cadenas usamos la funcion de ecape correspondiente a la base de datos

    $cadena = "esta 'esto es el ataque'";
    $cadena = $bd->real_escape_string($cadena);

    $sentencia = "update prueba1 set " .
        " numero = 2000" .
        "cadena = '$cadena' ".
        " where id=2";
    $consulta->$bd->query($sentencia);
    if (!$consulta) {
        paginaError("Error al modificar");
        exit;
    }
}


$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Pruebas",
        "LINK" => "/aplicacion/prueba/pruebabd.php"
    ],
];

// VISTA
inicioCabecera("Personalizar");
cabecera();
finCabecera();

inicioCuerpo("Personalizar", $barraUbi);
cuerpo($fila);
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo(array $filas)
{

?>
    <table>
        <thead>
            <tr>
                <th>CADENA</th>
                <th>NUMERO</th>
                <th>DESCRIPCION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($filas as $fila) {
                echo "<tr>";
                echo "<td>{$fila["cadena"]}</td>";
                echo "<td>{$fila["numero"]}</td>";
                echo "<td>{$fila["descripcion"]}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="pruebabd.php?oper=1">Modificar Fila 2</a>

<?php
}

function mostrarResumen() {}
