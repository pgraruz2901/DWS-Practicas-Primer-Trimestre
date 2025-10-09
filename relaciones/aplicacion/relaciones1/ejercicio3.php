<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//barra ubicacion
$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion1",
        "LINK" => "/aplicacion/relaciones1"
    ],
    [
        "TEXTO" => "Ejercicio3",
        "LINK" => "/aplicacion/relaciones1/ejercicio3.php"
    ]
];
inicioCabecera("Ejercicios");
cabecera();
finCabecera();

inicioCuerpo("Ejercicios", $barraUbi);
cuerpo(); //llamo a la vista
finCuerpo();
function cabecera() {}
function cuerpo()
{
?>
    <br>
<?php
    $array = array();
    $array[1] = "uno";
    $array[16] = "dieciseis";
    $array[54] = "cincuenta y cuatro";
    $array[] = 34;
    $array["uno"] = "cadena";
    $array["dos"] = true;
    $array["tres"] = 1.345;
    $array["ultima"] = [1, 34, "nueva"];

    $array2 = [
        "1" => "uno",
        "16" => "dieciseis",
        "54" => "cincuenta y cuatro",
        "" => 34,
        "uno" => "cadena",
        "dos" => true,
        "tres" => 1.345,
        "ultima" => [1, 34, "nueva"],
    ];
    $array3 = array(
        "1" => "uno",
        "16" => "dieciseis",
        "54" => "cincuenta y cuatro",
        "" => 34,
        "uno" => "cadena",
        "dos" => true,
        "tres" => 1.345,
        "ultima" => [1, 34, "nueva"],
    );


    function mostrararray($array)
    {
        foreach ($array as $key => $valor) {
            echo "la clave es " . $key . " y el valor es " . (is_array($valor) ? implode(', ', $valor) : $valor) . "<br>";
        }
    }
    echo "Array 1 <br>";
    mostrararray($array);
    echo "Array 2 <br>";
    mostrararray($array2);
    echo "Array 3 <br>";
    mostrararray($array3);
}
