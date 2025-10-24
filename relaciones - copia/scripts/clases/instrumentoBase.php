<?php

class instrumentoBase
{
    //variables de la clase
    public $descripcion;
    private $edad = 10;
    protected static $orden = 0;
    private $ordenCrea = 0;

    function __construct($descripcion, $edad)
    {
        $this->descripcion = $descripcion;
        $this->edad = $edad;
        self::$orden++;
        $this->ordenCrea = self::$orden;
    }

    //getter, setter
    function getedad()
    {
        return $this->edad;
    }
    function getdescripcion()
    {
        return $this->descripcion;
    }
    function setedad($eda)
    {
        return $this->edad = $eda;
    }
    function setdescripcion($desc)
    {
        return $this->descripcion = $desc;
    }
    //funcion envejecer
    function envejecer()
    {
        return $this->edad + 1;
    }
    //funcion sonido
    //abstract function sonido();
    //funcion afinar
    //abstract function afinar();
    public function __toString()
    {
        return "Instrumento con descripcion " . $this->getdescripcion() . ", instancia " . $this->ordenCrea . " de un total de " . self::$orden . ". Tiene " . $this->getedad() . " años. La clase es " . get_class($this);
    }
}
