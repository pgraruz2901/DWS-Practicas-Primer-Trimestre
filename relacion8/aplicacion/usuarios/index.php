<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

if (!$acceso->hayUsuario()) {
    header("Location: /aplicacion/acceso/login.php");
    exit();
}

$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "usuarios",
        "LINK" => "/aplicacion/usuarios/index.php"
    ],
];


if ($bd->connect_errno) {
    echo paginaError("No se ha podido conectar la base de datos");
    exit;
}
$sentSelect = "*";
$sentFrom = "usuarios";
$sentWhere = "";
$sentOrder = "";

//construyo la sentencia
$sentencia = "SELECT $sentSelect " .
    "FROM $sentFrom";

$consulta = $bd->query($sentencia);

if (!$consulta) {
    paginaError("No se ha podido conectar la base de datos");
    exit;
}
$fila = [];
$filas = [];
while ($fila = $consulta->fetch_assoc()) {
    $fila['cod_usuario'] = $fila['Nick'] . ":" . $fila['nombre'] . ":" . $fila['nif'] . ":" . $fila['direccion'] . ":" . $fila['poblacion'] . ":" . $fila['provincia'] . ":" . $fila['CP'] . ":" . $fila['fecha_nacimiento'] . ":" . $fila['borrado'] . ":" . $fila['foto'];
    $filas[] = $fila;
}

// VISTA
inicioCabecera("Usuarios");
cabecera();
finCabecera();

inicioCuerpo("Usuarios", $barraUbi);
cuerpo($filas);
finCuerpo();


// FUNCIONES DE LA VISTA

function cabecera() {}

function cuerpo($filas)
{

?>
    <table>
        <thead>
            <tr>
                <th>Nick</th>
                <th>nombre</th>
                <th>nif</th>
                <th>direccion</th>
                <th>poblacion</th>
                <th>provincia</th>
                <th>CP</th>
                <th>fecha_nacimiento</th>
                <th>borrado</th>
                <th>foto</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($filas as $fila) {
                echo "<tr>";
                echo "<td>{$fila['Nick']}</td>";
                echo "<td>{$fila['nombre']}</td>";
                echo "<td>{$fila['nif']}</td>";
                echo "<td>{$fila['direccion']}</td>";
                echo "<td>{$fila['poblacion']}</td>";
                echo "<td>{$fila['provincia']}</td>";
                echo "<td>{$fila['CP']}</td>";
                echo "<td>{$fila['fecha_nacimiento']}</td>";
                echo "<td>{$fila['borrado']}</td>";
                echo "<td><img src='/aplicacion/imagenes/{$fila['foto']}'></td>";
                echo "<td><a href=''>ver</a> - <a href=''>modificar</a> - <a href=''>borrar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a id="crearUsu" href="/aplicacion/usuarios/nuevoUsuario.php">Crear nuevo usuario</a>
<?php
}

function mostrarResumen() {}
