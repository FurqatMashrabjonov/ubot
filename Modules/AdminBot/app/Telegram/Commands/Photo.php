<?php

namespace Modules\AdminBot\Telegram\Commands;

use Modules\AdminBot\Telegram\Conversations\PhotoUploadConversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\WebApp\WebAppInfo;
use function Nutgram\Laravel\Support\webAppData;

class Photo extends Command
{
    protected string $command = 'photo';

    protected ?string $description = 'Rasm yuklash';

    public function handle(Nutgram $bot): void
    {
        PhotoUploadConversation::begin($bot);
    }
}
