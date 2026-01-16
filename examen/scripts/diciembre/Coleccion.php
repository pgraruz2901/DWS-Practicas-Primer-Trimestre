<?php
class Coleccion
{
    public const TEMATICAS = [
        "cienciaficcion" => 10,
        "terror" => 20,
        "policiaco" => 30,
        "comedia" => 40
    ];
    protected string $_nombre;
    protected string $_fecha_alta;
    protected int $_tematica;
    protected string $_tematica_descripcion;
    private array $_libros;
    //Constructor
    public function __construct(string $nombre, string $fecha_alta, int $tematica)
    {
        if ($this->setNombre($nombre) == -10) {
            throw new Exception("El nombre no es valido");
        }
        if ($this->setFechaAlta($fecha_alta) == -10) {
            $this->_fecha_alta = "01/10/2025";
        }
        if ($this->setTematica($tematica) == -10) {
            $this->_tematica = 10;
            $this->_tematica_descripcion = array_keys(self::TEMATICAS)[0];
        }
    }

    //getters
    public function getNombre(): string
    {
        return $this->_nombre;
    }
    public function getfechaAlta(): string
    {
        return $this->_fecha_alta;
    }
    public function getTematica(): int
    {
        return $this->_tematica;
    }
    public function getTematicaDescripcion(): string
    {
        return $this->_tematica_descripcion;
    }
    //setters
    public function setNombre(string $nombre): int
    {
        if (validaCadena($nombre, 40, "")) {
            $this->_nombre = $nombre;
            return 10;
        }
        return -10;
    }
    public function setFechaAlta(string $fecha): int
    {
        if (!validaFecha($fecha, "01/10/2025")) {
            return -10;
        }
        $fechas = DateTime::createFromFormat("d/m/Y", $fecha);
        $fechaAhora = new DateTime();
        $fecha4year = $fechaAhora->modify("-4 years");
        if ($fechas > $fechaAhora || $fechas < $fecha4year) {
            return -10;
        }
        $this->_fecha_alta = $fecha;
        return 10;
    }
    public function setTematica(int $tematica): int
    {
        $index = null;
        foreach (self::TEMATICAS as $key => $value) {
            if ($value === $tematica) {
                $index = $key;
                break;
            }
        }
        if ($index) {
            $this->_tematica = $tematica;
            $this->_tematica_descripcion = $index;
            return 10;
        } else {
            return -10;
        }
    }
    //Metodo aniadirLibro
    public function aniadirLibro(Libro $libro)
    {
        $this->_libros[] = $libro;
    }
    public function dameLibros(): array
    {
        $libros = [];
        foreach ($this->_libros as $ind => $libro) {
            $libros[] = $libro;
        }
        return $libros;
    }

    //Desabilitar sobrecarga
    public function __set($name, $value)
    {
        throw new Exception("No se pueden crear propiedades dinámicas.");
    }
    public function __get($name)
    {
        throw new Exception("No se pueden acceder a propiedades dinámicas.");
    }
    public function __isset($name)
    {
        return;
    }
    public function __unset($name)
    {
        throw new \Exception('No se pueden eliminar propiedades dinámicas.');
    }
    //Metodo __toString
    public function __toString()
    {
        return "Coleccion " . $this->_nombre . " añadida el " . $this->getfechaAlta() . " de tematica " . $this->getTematicaDescripcion();
    }
}
