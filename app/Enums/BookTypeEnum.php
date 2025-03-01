<?php

namespace App\Enums;

enum BookTypeEnum: string
{
    case PRINTED = 'printed';
    case DIGITAL = 'digital';
    case GRAPHIC = 'graphic';

    public function label(): string
    {
        return match ($this) {
            self::PRINTED => 'Печатное издание',
            self::DIGITAL => 'Цифровое издание',
            self::GRAPHIC => 'Графическое издание',
        };
    }
}
