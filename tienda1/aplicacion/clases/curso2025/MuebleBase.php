<?php

abstract class MuebleBase
{
    //variables de la clase
    public const MATERIALES_POSIBLES = [
        1 => "madera",
        2 => "metal",
        3 => "vidrio",
        4 => "acero"
    ];
    public const MAXIMO_MUEBLES = 6;
    private $_mueblesCreados = 0;
    //propiedades
    protected string $nombre;
    public string $fabricante = "FMu";
    public string $pais = "ESPAÑA";
    public int $anio = 2020;
    public string $fechaIniVenta = "01/01/2020";
    public string $fechaFinVenta = "31/12/2040";
    public int $MaterialPrincipal = 1;
    public float $precio = 30;

    //Propiedad privada tipo Caracteristicas
    private Caracteristicas $caracteristicas;


    //constructor
    function __construct(string $nombre, ?string $fabricante, ?string $pais, ?int $anio, ?string $fechaIniVenta, ?string $fechaFinVenta, ?int $materialPrincipal, ?float $precio)
    {
        if (!$this->setNombre($nombre)) {
            throw new Exception("El nombre es erroneo");
        }
        if ($fabricante !== null) {
            $this->setFabricante($fabricante);
        }
        if ($pais !== null) {
            $this->setPais($pais);
        }
        if ($anio !== null) {
            $this->setAnio($anio);
        }
        if ($fechaIniVenta !== null) {
            $this->setFechaIniVenta($fechaIniVenta);
        }
        if ($fechaFinVenta !== null) {
            $this->setFechaFinVenta($fechaFinVenta);
        }
        if ($materialPrincipal !== null) {
            $this->setMaterialPrincipal($materialPrincipal);
        }
        if ($precio !== null) {
            $this->setPrecio($precio);
        }
        $this->_mueblesCreados++;
        if ($this->_mueblesCreados > self::MAXIMO_MUEBLES) {
            throw new Exception("Se ha superado el maximo de muebles permitidos");
        }
        $caracteristicas = new Caracteristicas();
        $this->caracteristicas = $caracteristicas;
    }

    //funcion dameListaPropiedades
    public function dameListaPropiedades()
    {
        return [
            'nombre' => $this->getNombre(),
            'fabricante' => $this->getFabricante(),
            'pais' => $this->getPais(),
            'anio' => $this->getAnio(),
            'fechaIniVenta' => $this->getFechaIniVenta(),
            'fechaFinVenta' => $this->getFechaFinVenta(),
            'materialPrincipal' => $this->getMaterialPrincipal(),
            'precio' => $this->getPrecio(),
        ];
    }

    //funcion damePropiedad
    public function damePropiedad(string $cadena, int $modo, mixed &$res)
    {
        $resultado = false;
        if ($cadena = "") {
            throw new Exception("La cadena esta vacia");
        }
        $metodo = "get" . ucfirst($cadena);
        if ($modo === 1) {
            if (method_exists($this, $metodo)) {
                //variable-funcion
                $res = $this->$metodo();
                $resultado = true;
            }
            return $resultado;
        } elseif ($modo === 2) {
            if (property_exists($this, $cadena)) {
                //variable-variable
                $res = $this->$cadena;
                $resultado = true;
            }
            if (method_exists($this, $metodo)) {
                $res = $this->$metodo();
                $resultado = true;
            }
            return $resultado;
        } else {
            throw new Exception("El modo es incorrecto");
        }
    }

    //funcion puedeCrear
    public function puedeCrear(int &$numero): bool
    {
        $cantidad = self::MAXIMO_MUEBLES - $this->_mueblesCreados;
        $numero = $cantidad;
        return $cantidad < self::MAXIMO_MUEBLES;
    }

    //funcion __ToString
    public function __toString()
    {
        "MUEBLE de clase " . $this->MaterialPrincipal . " con nombre " . $this->nombre . " , fabricante " . $this->fabricante . " , fabricado en " . $this->pais . " a partir del año " . $this->anio . " , vendido desde " . $this->fechaIniVenta . " hasta " . $this->fechaFinVenta . " , precio " . $this->precio . " de material " . $this->getMaterialDescripcion();
    }

    //Metodo Añadir
    public function añadir(...$args)
    {
        $total = count($args);
        //si el numero es impar quitamos el ultimo elemento
        if ($total % 2 !== 0) {
            array_pop($args);
            $total--;
        }
        for ($i = 0; $i < $total; $i++) {
            $carac = $args[$i];
            $valor = $args[$i + 1];
        }
        //Solo añadimos la caracteristica si es string
        if (is_string($carac)) {
            $this->caracteristicas[$carac] = $valor;
        }
    }
    //Metodo exportarCaracteristicas
        // public function exportarCaracteristicas(){
        //     for($i=0;$i<count($this->caracteristicas);$i++){
        //         $carac = $this->caracteristicas[$i];
        //         $valor = $this->caracteristicas[$i + 1];
        //     }
        // }

    //setters y getters
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function setNombre(string $nombre)
    {
        if (validaCadena($nombre, 40, $nombre) || $nombre = "") {
            $this->nombre = mb_strtoupper($nombre);
            return true;
        } else {
            return false;
        }
    }
    public function getFabricante(): string
    {
        return $this->fabricante;
    }
    public function setFabricante(string $fabricante)
    {
        if (validaCadena($fabricante, 30, "FMu:")) {
            $original = $fabricante;
            if (validaExpresion($fabricante, "/^FMu:/", "FMu:")) {
                $this->fabricante = $fabricante;
            } else {
                $this->fabricante = "FMu:" . $original;
            }
            return true;
        } else return false;
    }
    public function getPais(): string
    {
        return $this->pais;
    }
    public function setPais(string $pais)
    {
        if (validaCadena($pais, 20, "España")) {
            $this->pais = $pais;
            return true;
        } else return false;
    }
    public function getAnio(): int
    {
        return $this->anio;
    }
    public function setAnio(int $anio)
    {
        $año = (new DateTime())->format('yyyy');
        if (validaEntero($anio, 2020, $año, 2020)) {
            $this->anio = $anio;
            return true;
        } else return false;
    }
    public function getFechaIniVenta(): string
    {
        return $this->fechaIniVenta;
    }
    public function setFechaIniVenta(string $fechaIniVenta)
    {
        $resultado = false;
        if (validaFecha($fechaIniVenta, "01/01/2020")) {
            $fechaIni = new DateTime($fechaIniVenta);
            $fechafab = new DateTime("01/01/" . $this->anio);
            if ($fechaIni >= $fechafab) {
                $this->fechaIniVenta = $fechaIniVenta;
                $resultado = true;
            }
        }
        return $resultado;
    }
    public function getFechaFinVenta(): string
    {
        return $this->fechaFinVenta;
    }
    public function setFechaFinVenta(string $fechaFinVenta)
    {
        $resultado = false;
        if (validaFecha($fechaFinVenta, "31/12/2040")) {
            $finfecha = new DateTime($fechaFinVenta);
            $iniFecha = new DateTime($this->getFechaIniVenta());
            if ($finfecha > $iniFecha) {
                $this->fechaFinVenta = $fechaFinVenta;
                $resultado = true;
            }
        }
        return $resultado;
    }

    public function getMaterialPrincipal(): int
    {
        return $this->MaterialPrincipal;
    }
    public function setMaterialPrincipal(int $materialPrincipal)
    {
        $resultado = false;
        if (validaRango($materialPrincipal, self::MATERIALES_POSIBLES, 2)) {
            $resultado = true;
            $this->MaterialPrincipal = $materialPrincipal;
        }
        return $resultado;
    }
    public function getPrecio(): float
    {
        return $this->precio;
    }
    public function setPrecio(float $precio)
    {
        $resultado = false;
        if (validaReal($precio, 30, 999999, 30)) {
            $resultado = true;
            $this->precio = $precio;
        }
        return $resultado;
    }
    public function getMaterialDescripcion()
    {
        return self::MATERIALES_POSIBLES[$this->getMaterialPrincipal()];
    }
    // get, set, isset, unset: Sobrecarga
    final public function __get($name)
    {
        throw new Exception("No se ha permitido el acceso a la propiedad" . $name);
    }
    final public function __set($name, $value)
    {
        throw new Exception("Modificacion no permitida a la propiedad" . $name);
    }
    final public function __isset($name)
    {
        return false;
    }
    final public function __unset($name)
    {
        throw new Exception("No se ha podido eliminar la propiedad" . $name);
    }
}
