<?php
class ClaseMisPropiedades implements Iterator

{
    private $_propiedades = [];
    public mixed $propPublica;
    private mixed $_propPrivada = 25;

    //funcion __set
    public function __set($name, $value)
    {
        if ($name === '_propPrivada') {
            throw new Exception("No se puede asignar un valor a la propiedad privada _propPrivada");
        }
        $this->_propiedades[$name] = $value;
    }
    //funcion __get
    public function __get($name)
    {
        if ($name === '_propPrivada') {
            return $this->_propPrivada;
        }
        return $this->_propiedades[$name] ?? null;
    }

    //Iterable
    public function getIterator(): Traversable
    {
        $props = $this->_propiedades;
        $props['propPublica'] = $this->propPublica;
        $props['_propPrivada'] = $this->_propPrivada;

        foreach ($props as $key => $value) {
            yield 'oi_' . $key => $value;
        }
    }
    public function rewind(): void
    {
        reset($this->_propiedades);
    }
    public function current(): mixed
    {
        return current($this->_propiedades);
    }
    public function key(): mixed
    {
        return key($this->_propiedades);
    }
    public function next(): void
    {
        next($this->_propiedades);
    }
    public function valid(): bool
    {
        return key($this->_propiedades) !== null;
    }
}
