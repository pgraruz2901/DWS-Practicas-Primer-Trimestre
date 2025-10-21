<?php
enum EstadoCivil: int
{
    case Soltero = 10;
    case Casado = 20;
    case Pareja = 30;
    case Viudo = 40;
    //Metodo descripcion
    public function descripcion(): string
    {
        return match ($this) {
            self::Soltero => "Soltero",
            self::Casado => "Casado",
            self::Pareja => "Pareja",
            self::Viudo => "Viudo",
        };
    }
    //Metodo valor
    public function valor(): int
    {
        return $this->value;
    }
    //Metodo Casos
    static public function casos(): array
    {
        return array_map(fn($caso) => $caso->value, EstadoCivil::cases());
    }
}
