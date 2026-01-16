<?php
class Caracteristicas implements IteratorAggregate
{
    private array $caracteristicas = [];

    public function __construct()
    {
        $this->caracteristicas = [
            'ancho' => 100,
            'alto'  => 100,
            'largo' => 100
        ];
    }

    public function __set($name, $value)
    {
        if ($name === 'ningunamas') {
            $this->caracteristicas['ningunamas'] = true;
            return;
        }

        if (isset($this->caracteristicas['ningunamas']) && !isset($this->caracteristicas[$name])) {
            throw new Exception("No se pueden añadir más características");
        }

        // Validación de enteros para ancho/alto/largo
        if (in_array($name, ['ancho', 'alto', 'largo']) && !is_int($value)) {
            throw new Exception("El valor no es un número entero");
        }

        $this->caracteristicas[$name] = $value;
    }

    public function __get($name)
    {
        throw new Exception("No se ha permitido el acceso directo a la propiedad $name");
    }

    public function __isset($name)
    {
        return isset($this->caracteristicas[$name]);
    }

    public function __unset($name)
    {
        throw new Exception("No se puede eliminar la propiedad $name");
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->caracteristicas);
    }
}
