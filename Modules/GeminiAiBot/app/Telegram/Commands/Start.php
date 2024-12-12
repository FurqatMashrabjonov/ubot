<?php

namespace Modules\GeminiAiBot\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use Modules\GeminiAiBot\Helpers\TextHelper;
use SergiX44\Nutgram\Handlers\Type\Command;
use SergiX44\Nutgram\Telegram\Properties\ParseMode;

class Start extends Command
{
    protected string $command = 'start';

    protected ?string $description = 'Botni ishga tushurish';

    public function handle(Nutgram $bot): void
    {
        $bot->sendMessage(
            text: TextHelper::main(),
            parse_mode: ParseMode::MARKDOWN_LEGACY,
        );
    }
}
