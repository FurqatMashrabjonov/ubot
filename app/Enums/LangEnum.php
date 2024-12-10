<?php

namespace App\Enums;

enum LangEnum: string
{
    case EN = 'en';
    case RU = 'ru';
    case UZ = 'uz';

    public function label(): string
    {
        return match($this) {
            self::EN => __('lang.en'),
            self::RU => __('lang.ru'),
            self::UZ => __('lang.uz'),
            default => $this->value,
        };
    }
}
