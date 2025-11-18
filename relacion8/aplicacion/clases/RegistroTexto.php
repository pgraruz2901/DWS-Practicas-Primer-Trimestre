<?php
class RegistroTexto
{
    private string $_cadena;
    private DateTime $_fechaHora;

    public function __construct($cadena)
    {
        $this->_cadena = $cadena;
        $this->_fechaHora = new DateTime();
    }


    public function __toString(): string
    {
        return $this->getCadena() . " en la fecha " . $this->getFechaHora()->format("d-m-Y H:i:s");
    }
    public function getCadena(): string
    {
        return $this->_cadena;
    }
    public function getFechaHora(): DateTime
    {
        return $this->_fechaHora;
    }
}
