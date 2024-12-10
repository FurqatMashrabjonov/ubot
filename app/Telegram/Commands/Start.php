<?php

namespace App\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;

class Start extends Command
{
    protected string $command = 'start';

    protected ?string $description = 'Botni ishga tushurish';

    public function handle(Nutgram $bot): void
    {
        $bot->sendMessage('Salom');
    }
}
