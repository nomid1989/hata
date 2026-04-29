<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum PropertyStatus: string implements HasLabel, HasColor
{
    case Draft = 'draft';
    case Accepted = 'accepted';
    case Published = 'published';
    case Archived = 'archived';

    public function getLabel(): string
    {
        return match ($this) {
            self::Draft => 'Чернетка',
            self::Accepted => 'Прийнято',
            self::Published => 'Опубліковано',
            self::Archived => 'В архіві',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Draft => 'gray',
            self::Accepted => 'warning',
            self::Published => 'success',
            self::Archived => 'danger',
        };
    }
}
