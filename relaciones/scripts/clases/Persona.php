<?php
class Persona
{
    private string $_nombre;
    private string $_fecha_Nacimiento;
    private string $_domicilio;
    private string $_localidad;
    private EstadoCivil $_estado;
    //constructor
    private function __construct(string $nombre, string $fecha_Nacimiento, string $domicilio, string $localidad, EstadoCivil $estado)
    {
        $this->_nombre = $nombre;
        $this->_fecha_Nacimiento = $fecha_Nacimiento;
        $this->_domicilio = $domicilio;
        $this->_localidad = $localidad;
        $this->_estado = $estado;
    }
    //Constructor estatico al que se le pasan los parametros
    static public function registrarPersona(string $nombre, string $fecha, string $domicilio, string $localidad, EstadoCivil $estado)
    {
        return new Persona($nombre, $fecha, $domicilio, $localidad, $estado);
    }
    //Metodo __toString
    public function __toString()
    {
        return $this->_nombre . " es una persona " . $this->_estado->descripcion() . " nacida en " . $this->_fecha_Nacimiento . " y que vive en " . $this->_domicilio . " en la localidad " . $this->_localidad;
    }
    //getters
    public function getNombre(): string
    {
        return $this->_nombre;
    }
    public function getFecha_Nacimiento(): string
    {
        return $this->_fecha_Nacimiento;
    }
    public function getDomicilio(): string
    {
        return $this->_domicilio;
    }
    public function getLocalidad(): string
    {
        return $this->_localidad;
    }
    public function getEstado(): EstadoCivil
    {
        return $this->_estado;
    }
    //setters
    public function setNombre(string $nombre): void
    {
        $this->_nombre = $nombre;
    }
    public function setFecha_Nacimiento(string $fecha_Nacimiento): void
    {
        $this->_fecha_Nacimiento = $fecha_Nacimiento;
    }
    public function setDomicilio(string $domicilio): void
    {
        $this->_domicilio = $domicilio;
    }
    public function setLocalidad(string $localidad): void
    {
        $this->_localidad = $localidad;
    }
    public function setEstado(EstadoCivil $estado): void
    {
        $this->_estado = $estado;
    }
}
