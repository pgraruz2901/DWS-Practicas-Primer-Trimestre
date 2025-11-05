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
    public int $MaterialPrincipal;
    public float $Precio = 30;


    //constructor
    function __construct(string $nombre, string $fabricante, string $pais)
    {
        $this->setNombre($nombre);
    }
    //setters y getters
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function setNombre(string $nombre)
    {
        if (validaCadena($nombre, 40, $nombre) || $nombre = "") {
            $this->nombre = mb_strtoupper($nombre);
        } else {
            throw new Exception("El nombre es erroneo");
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
        } else throw new Exception("El fabricante es erroneo");
    }
    public function getPais(): string
    {
        return $this->pais;
    }
    public function setPais(string $pais)
    {
        if (validaCadena($pais, 20, "España")) {
            $this->pais = $pais;
        } else throw new Exception("El pais esta mal");
    }
    public function getAnio(): int
    {
        return $this->anio;
    }
    public function setAnio(int $anio)
    {
        $año = (new DateTime())->format('yyyy');
    }
    public function getMaterialPrincipal(): int
    {
        return $this->MaterialPrincipal;
    }
    public function setMaterialPrincipal(int $materialPrincipal): void
    {
        $this->MaterialPrincipal = $materialPrincipal;
    }
    public function getPrecio(): float
    {
        return $this->Precio;
    }
    public function setPrecio(float $precio)
    {
        $this->Precio = $precio;
    }
    public function getFechaIniVenta(): string
    {
        return $this->fechaIniVenta;
    }
    public function setFechaIniVenta(string $fechaIniVenta): void
    {
        $this->fechaIniVenta = $fechaIniVenta;
    }
    public function getFechaFinVenta(): string
    {
        return $this->fechaFinVenta;
    }
    public function setFechaFinVenta(string $fechaFinVenta): void
    {
        $this->fechaFinVenta = $fechaFinVenta;
    }
}
