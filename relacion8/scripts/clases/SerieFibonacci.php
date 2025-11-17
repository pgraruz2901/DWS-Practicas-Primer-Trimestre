<?php
class SerieFibonacci implements Iterator
{
    //serie fibonacci usando $_limite y $_clave actual
    private int $_limite;
    private int $_claveActual;
    //cnstructor
    public function __construct(int $limite)
    {
        $this->_limite = $limite;
        $this->_claveActual = 0;
    }
    public function current(): mixed
    {
        return $this->fibonacci($this->_claveActual);
    }
    public function key(): int
    {
        return $this->_claveActual;
    }
    public function next(): void
    {
        $this->_claveActual++;
    }
    public function valid(): bool
    {
        return $this->_claveActual < $this->_limite;
    }
    public function rewind(): void
    {
        $this->_claveActual = 0;
    }
    private function fibonacci(int $num1)
    {
        return match ($num1) {
            0 => 0,
            1 => 1,
            default => $this->fibonacci($num1 - 1) + $this->fibonacci($num1 - 2)
        };
    }
}
