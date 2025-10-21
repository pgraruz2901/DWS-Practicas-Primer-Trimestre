<?php
//no se puede heredar de la clase flauta
final class Flauta extends InstrumentoViento implements IFabricable
{
    //Constructor privado
    private function __construct($descripcion, $edad, $material)
    {
        parent::__construct($descripcion, $edad, $material);
    }
    //getter
    //Metodo CrearDesdeArray
    static public function CrearDesdeArray(array $datos): Flauta
    {
        return new Flauta($datos[0] ?? "Esto es una flauta", $datos["edad"] ?? 0, $datos["material"] ?? "plastico duro");
    }
    public function Clonacion()
    {
        return new Flauta($this->getdescripcion(), 0, $this->_material);
    }
    //metodos de IFabricable
    public function metodoFabricacion()
    {
        return "Estos son los pasos para fabricar una flauta";
    }
    //metodo reciclado
    public function metodoReciclado()
    {
        return "Estos son los pasos para reciclar una flauta";
    }
}
