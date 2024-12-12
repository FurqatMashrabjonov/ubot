<?php

namespace Modules\AdminBot\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;
use Modules\AdminBot\Telegram\Conversations\PhotoUploadConversation;

class Photo extends Command
{
    protected string $command = 'photo';

    protected ?string $description = 'Rasm yuklash';

    public function handle(Nutgram $bot): void
    {
        PhotoUploadConversation::begin($bot);
    }
}
