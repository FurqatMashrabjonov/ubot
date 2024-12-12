<?php

namespace App\Enums;

enum ProductStatusEnum: string
{
    case INACTIVE = 'inactive';
    case ACTIVE   = 'active';

    case PUBLIC = 'public';

    case PRIVATE = 'private';

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

    public static function options(): array
    {
        return [
            self::INACTIVE->value => 'Inactive',
            self::ACTIVE->value   => 'Active',
            self::PUBLIC->value   => 'Public',
            self::PRIVATE->value  => 'Private',
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::INACTIVE => 'Inactive',
            self::ACTIVE   => 'Active',
            self::PUBLIC   => 'Public',
            self::PRIVATE  => 'Private',
        };
    }
}
