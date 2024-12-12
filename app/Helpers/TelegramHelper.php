<?php

namespace App\Helpers;

class TelegramHelper
{
    public static function getFullPath(string $path): string
    {
        return 'https://api.telegram.org/file/bot' . config('nutgram.token') . '/' . $path;
    }
}
