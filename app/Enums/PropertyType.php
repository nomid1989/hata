<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PropertyType: string implements HasLabel
{
    case Apartment = 'apartment';
    case HotelRoom = 'hotel_room';
    case Commercial = 'commercial';

    public function getLabel(): string
    {
        return match ($this) {
            self::Apartment => 'Квартира',
            self::HotelRoom => 'Готельний номер',
            self::Commercial => 'Комерційне приміщення',
        };
    }
}
