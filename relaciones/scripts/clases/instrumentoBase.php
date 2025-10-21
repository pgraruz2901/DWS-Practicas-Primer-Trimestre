<?php

abstract class InstrumentoBase
{
    //variables de la clase
    private $_descripcion;
    private $_edad = 10;
    protected static $_orden = 0;
    public $ordenCrea = 0;

    //constructor
    function __construct($descripcion, $edad)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
        self::$_orden++;
        $this->ordenCrea = self::$_orden;
    }

    //getter, setter
    function getedad()
    {
        return $this->_edad;
    }
    function getdescripcion()
    {
        return $this->_descripcion;
    }
    function setedad($eda)
    {
        return $this->_edad = $eda;
    }
    function setdescripcion($desc)
    {
        return $this->_descripcion = $desc;
    }
    //funcion envejecer
    function envejecer()
    {
        return $this->_edad + 1;
    }
    //funcion sonido
    abstract function sonido();
    //funcion afinar
    abstract function afinar();
    public function __toString()
    {
        return "Instrumento con descripcion " . $this->getdescripcion() . ", instancia " . $this->ordenCrea . " de un total de " . self::$_orden . ". Tiene " . $this->getedad() . " años. La clase es " . get_class($this);
    }
}
