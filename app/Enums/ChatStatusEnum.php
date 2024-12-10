<?php

namespace App\Enums;

use function PHPUnit\Framework\matches;

enum ChatStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case BLOCKED = 'blocked';
    case DELETED = 'deleted';

    public static function getValues(): array
    {
        return [
            self::ACTIVE,
            self::INACTIVE,
            self::BLOCKED,
            self::DELETED,
        ];
    }

    public static function getColors()
    {
        return [
            self::ACTIVE->value => 'success',
            self::INACTIVE->value => 'danger',
            self::BLOCKED->value => 'warning',
            self::DELETED->value => 'primary',
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => __('chat.active'),
            self::INACTIVE => __('chat.inactive'),
            self::BLOCKED => __('chat.blocked'),
            self::DELETED => __('chat.deleted'),
            default => $this->value,
        };
    }
}
