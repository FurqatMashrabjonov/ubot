<?php

namespace Modules\AdminBot\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\WebApp\WebAppInfo;
use function Nutgram\Laravel\Support\webAppData;

class Start extends Command
{
    protected string $command = 'start';

    protected ?string $description = 'Botni ishga tushurish';

    public function handle(Nutgram $bot): void
    {
        $bot->sendMessage('Salom bu admin bot');
    }
}
