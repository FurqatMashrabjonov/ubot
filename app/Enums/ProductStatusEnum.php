<?php

namespace App\Enums;

enum ProductStatusEnum: string
{
    case INACTIVE = 'inactive';
    case ACTIVE = 'active';

    public static function getValues(): array
    {
        return [
            self::INACTIVE,
            self::ACTIVE,
        ];
    }

    public static function getKeys(): array
    {
        return array_keys(self::getValues());
    }

    public function label(): string
    {
        return match ($this) {
            self::INACTIVE => 'Inactive',
            self::ACTIVE => 'Active',
        };
    }
}
