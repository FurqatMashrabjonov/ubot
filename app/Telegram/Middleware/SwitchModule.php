<?php

namespace App\Telegram\Middleware;

use App\Models\Chat;
use Nwidart\Modules\Facades\Module;
use SergiX44\Nutgram\Nutgram;

class SwitchModule
{
    public function __invoke(Nutgram $bot, $next): void
    {
        $next($bot);
    }
}
