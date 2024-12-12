<?php

namespace App\Telegram\Middleware;

use SergiX44\Nutgram\Nutgram;

class SwitchModule
{
    public function __invoke(Nutgram $bot, $next): void
    {
        $next($bot);
    }
}
