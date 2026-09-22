<?php

namespace App;

enum UserRole: string
{
    case Admin = 'admin';
    case Consulta = 'consulta';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Administrador',
            self::Consulta => 'Consulta',
        };
    }
}
