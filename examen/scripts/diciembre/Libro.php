<?php
class Libro
{
    private string $_nombre;
    private string $_autor;
    private array $_otrasProp;

    public function __construct(string $nombre, string $autor, ...$args)
    {
        if ($nombre === "") {
            throw new Exception("El nombre no es valido");
        } else {
            $this->_nombre = $nombre;
        }
        if ($autor === "") {
            throw new Exception("El autor no es valido");
        } else {
            $this->_autor = $autor;
        }
        $numArgumentos = count($args);
        if ($numArgumentos < 2) {
            return;
        }
        if ($numArgumentos % 2 != 0) {
            $numArgumentos--;
        }
        for ($i = 1; $i < $numArgumentos; $i++) {
            if ($i === 1 || $i % 2 === 1) {
                if (is_string($args[$i])) {
                    $valorI = $i;
                    $this->set($args[$i], $args[$valorI++]);
                } else {
                    $i++;
                }
            }
        }
    }
    public function current(): mixed
    {
        return current($this->_otrasProp);
    }

    public function set(string $name, int $value)
    {
        if ($name === "nombre") {
            $this->_nombre = $value;
        } else if ($name === "autor") {
            $this->_autor = $value;
        } else {
            $nombre = mb_strtolower($name);
            $longitud = mb_strlen($nombre);
            $todasLetras = mb_split($name, "");
            $nomUltMayusc = "";
            for ($i = 1; $i <= $longitud; $i++) {
                if ($i < $longitud) {
                    $nomUltMayusc .= $todasLetras[$i];
                } else if ($i === $longitud) {
                    $letraMayus = mb_strtoupper($todasLetras[$i]);
                    $nomUltMayusc .= $letraMayus;
                }
            }
            $this->_otrasProp[$nomUltMayusc] = $value;
        }
    }
}
