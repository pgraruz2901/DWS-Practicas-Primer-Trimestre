<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

/* Comprobación de si se puede acceder o no
 if (!$acceso->puedeConfigurar())
 {
 paginaError("No tienes permiso para acceder a esta página");
 exit;
 }
*/

//inicializaciones
$datos = [
    "nombre" => "",
    "contraseña" => "",
    "fechaNac" => "",
    "horaLevantarse" => "",
    "Estado" => "",
    "Hermanos" => "",
    "sueldo" => ""
];
$errores = [];



//comprobar si se ha dado a insertar
if ($_POST) {
    $nombre = "";
    if (isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
        $nombre = strtolower(trim($nombre));
    }
    if ($nombre == "")
        $errores["nombre"][] = "Debe indicarse un nombre";

    if (strlen($nombre) > 20)
        $errores["nombre"][] = "El nombre no puede tener mas de 30
 caracteres";

    $datos["nombre"] = $nombre;

    $precio = 0;
    if (isset($_POST["precio"])) {
        $precio = floatval($_POST["precio"]);
    }

    if ($precio == 0)
        $errores["precio"][] = "Debe indicarse un precio";

    $datos["precio"] = $precio;


    if (!$errores) //no hay errores hago la insercion
    {
        //codigo para el nuevo articulo
        $codigo = 1; //codigo

        //se guarda el articulo

        //ir a ver el articulo insertado
        header("location: verArticulo.php?id=$codigo");
        exit;
    }
}


inicioCabecera("PRUEBA: articulos");
cabecera();
finCabecera();

inicioCuerpo("NUEVO ARTICULO");
cuerpo($datos, $errores);
finCuerpo();

// **********************************************************

function cabecera() {}


function cuerpo($datos, $errores)
{


?>
    <br>
    <br>
    <br>

<?php
    formulario($datos, $errores);
}

function formulario($datos, $errores)
{
    if ($errores) { //mostrar los errores
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div>";
    }

?>
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre"
            value="<?php echo $datos["nombre"]; ?>" size=21
            maxlength="20"><br>
        <label for="precio">Precio: </label>
        <input type="text" name="precio" id="precio"
            value="<?php echo $datos["precio"]; ?>" size=4
            maxlength="3"><br>
        <input type="submit" class="boton" value="Crear">
    </form>
<?php
}
