<?php
class InstrumentoViento extends InstrumentoBase
{
    protected string $_material;
    //constructor
    function __construct($descripcion = "instrumento de viento", int $edad = 15, string $material = "madera")
    {
        parent::__construct($descripcion, $edad);
        $this->_material = $material;
    }
    //metodo afinar
    final function afinar()
    {
        return "Estos son los pasos para afinar el instrumento";
    }
    //metodo sonido
    public function sonido()
    {
        return "Este es el sonido del instrumento <br>";
    }
    //metodo __toString
    public function __toString()
    {
        return parent::__toString() . " Instrumento de material " . $this->_material . "<br><br>";
    }
}
