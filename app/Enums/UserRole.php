<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserRole: string implements HasLabel
{
    case Owner = 'owner';
    case Admin = 'admin';
    case Manager = 'manager';

    public function getLabel(): string
    {
        return match ($this) {
            self::Owner => 'Власник',
            self::Admin => 'Адміністратор',
            self::Manager => 'Менеджер',
        };
    }
}
