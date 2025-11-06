<?php
final class MuebleTradicional extends MuebleBase
{
    public float $peso = 15;
    public string $serie = "SO1";
    public function __construct(string $nombre, ?string $fabricante, ?string $pais, ?int $anio, ?string $fechaIniVenta, ?string $fechaFinVenta, ?int $materialPrincipal, ?float $precio, ?float $peso, ?string $serie)
    {
        if (!$this->setPeso($peso)) {
            throw new Exception("El peso es incorrecto");
        }
        $this->serie = $serie;
        parent::__construct($nombre, $fabricante, $pais, $anio, $fechaIniVenta, $fechaFinVenta, $materialPrincipal, $precio);
    }
    //setters y getters
    public function getPeso(): float
    {
        return $this->peso;
    }
    public function getSerie(): string
    {
        return $this->serie;
    }
    public function setPeso(string $peso)
    {
        $resultado = false;
        if (validaReal($peso, 15, 300, 15)) {
            $this->peso = $peso;
            $resultado = true;
        }
        return $resultado;
    }
    public function setSerie(float $serie)
    {
        $this->serie = $serie;
        return true;
    }
    public function dameListaPropiedades()
    {
        return array_merge(
            parent::dameListaPropiedades(),
            [
                'peso' => $this->getPeso(),
                'serie' => $this->getSerie()
            ]
        );
    }
    public function __toString()
    {
        return parent::__toString() . " , peso " . $this->peso . " , serie " . $this->serie;
    }
}
