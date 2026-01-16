<?php
final class MuebleReciclado extends MuebleBase
{
    public $porcentajeReciclado = 10;
    function __construct(string $nombre, ?string $fabricante, ?string $pais, ?int $anio, ?string $fechaIniVenta, ?string $fechaFinVenta, ?int $materialPrincipal, ?float $precio, ?int $porcentajeReciclado)
    {
        parent::__construct($nombre, $fabricante, $pais, $anio, $fechaIniVenta, $fechaFinVenta, $materialPrincipal, $precio);
        if (!$this->setPorcentajeReciclado($porcentajeReciclado)) {
            throw new Exception("El porcentaje de reciclado es incorrecto");
        }
    }
    //funciones getters y getters
    public function getPorcentajeReciclado(): int
    {
        return $this->porcentajeReciclado;
    }
    public function setPorcentajeReciclado(int $porcentajeReciclado): bool
    {
        $resultado = false;
        if (validaEntero($porcentajeReciclado, 0, 100, 10)) {
            $this->porcentajeReciclado = $porcentajeReciclado;
            $resultado = true;
        }
        return $resultado;
    }
    public function dameListaPropiedades()
    {
        return array_merge(
            parent::dameListaPropiedades(),
            [
                'porcentajeReciclado' => $this->getPorcentajeReciclado()
            ]
        );
    }
    public function __toString()
    {
        return parent::__toString() . " , porcentaje reciclado " . $this->porcentajeReciclado;
    }
}
