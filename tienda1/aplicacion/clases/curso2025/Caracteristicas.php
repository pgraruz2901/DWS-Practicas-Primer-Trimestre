<?php
class Caracteristicas implements IteratorAggregate
{
    //Array Caracteristicas
    private array $caracteristicas = [];

    //Constructor
    public function __construct()
    {
        $this->caracteristicas['ancho'] = 100;
        $this->caracteristicas['alto'] = 100;
        $this->caracteristicas['largo'] = 100;
    }

    //Forma dinamica
    final public function __get($name)
    {
        throw new Exception("No se ha permitido el acceso a la propiedad" . $name);
    }
    final public function __set($name, $value)
    {
        if ($name == "ningunamas") {
            if (validaRango("ningunamas", $this->caracteristicas, 2) && !$this->__isset($name)) {
                throw new Exception("No se puede crear mas caracteristicas");
            }
        } elseif (in_array($name, ["ancho", "alto", "largo"]) && is_int($value)) {
            throw new Exception("El valor no es un numero entero");
        } else {
            $this->caracteristicas[$name] = $value;
        }
    }
    final public function __isset($name)
    {
        return false;
    }
    final public function __unset($name)
    {
        throw new Exception("No se ha podido eliminar la propiedad" . $name);
    }
    //Implementacion IteratorAggregate
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->caracteristicas);
    }
}
