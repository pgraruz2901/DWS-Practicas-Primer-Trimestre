<?php

class Punto
{
    public const COLORES = [
        "black" => ["nombre" => "negro", "rgb" => [0, 0, 0]],
        "white" => ["nombre" => "blanco", "rgb" => [255, 255, 255]],
        "red" => ["nombre" => "rojo", "rgb" => [255, 0, 0]],
        "green" => ["nombre" => "verde", "rgb" => [0, 255, 0]],
        "blue" => ["nombre" => "azul", "rgb" => [0, 0, 255]]
    ];

    public const GROSOR = [
        1 => "fino",
        2 => "medio",
        3 => "grueso",
    ];

    private int $_x;
    private int $_y;
    private string $_color;
    private int $_grosor;

    public function __construct($x, $y, $color, $grosor)
    {
        if (!$this->setX((int)$x)) {
            throw new Exception("La coordenada X no es válida");
        }
        if (!$this->setY((int)$y)) {
            throw new Exception("La coordenada Y no es válida");
        }
        if (!$this->setColor($color)) {
            throw new Exception("El color no es válido");
        }
        if (!$this->setGrosor((int)$grosor)) {
            throw new Exception("El grosor no es válido");
        }
    }
    public function getX(): int
    {
        return $this->_x;
    }
    public function getY(): int
    {
        return $this->_y;
    }
    public function getColor(): string
    {
        return $this->_color;
    }
    public function getGrosor(): int
    {
        return $this->_grosor;
    }

    public function setX(int $x): bool
    {
        if (validaEntero($x, 0, 20000, 0)) {
            $this->_x = $x;
            return true;
        }
        return false;
    }

    public function setY(int $y): bool
    {
        if (validaEntero($y, 0, 20000, 0)) {
            $this->_y = $y;
            return true;
        }
        return false;
    }

    public function setColor(string $color): bool
    {
        if (validaRango($color, Punto::COLORES, 2)) {
            $this->_color = $color;
            return true;
        }
        return false;
    }

    public function setGrosor(int $grosor): bool
    {
        if (validaRango($grosor, Punto::GROSOR, 2)) {
            $this->_grosor = $grosor;
            return true;
        }
        return false;
    }
    //- No se pueden crear propiedades dinámicas.
    public function __set($name, $value)
    {
        throw new Exception("No se pueden crear propiedades dinámicas.");
    }
    public function __get($name)
    {
        throw new Exception("No se pueden acceder a propiedades dinámicas.");
    }
    public function __isset($name)
    {
        throw new \Exception('No se pueden comprobar propiedades dinámicas.');
    }
    public function __unset($name)
    {
        throw new \Exception('No se pueden eliminar propiedades dinámicas.');
    }
}
