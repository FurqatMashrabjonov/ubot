<?php

namespace Modules\MainBot\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;
use SergiX44\Nutgram\Telegram\Types\WebApp\WebAppInfo;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class Start extends Command
{
    protected string $command = 'start';

    protected ?string $description = 'Botni ishga tushurish';

    public function handle(Nutgram $bot): void
    {
        $bot->sendMessage(
            text: 'Salom, bu universal bot',
            reply_markup: InlineKeyboardMarkup::make()
                ->addRow(
                    InlineKeyboardButton::make('Products', web_app: WebAppInfo::make(config('app.webhook_url') . route('products.index', [], false))),
                    InlineKeyboardButton::make('B', callback_data: 'type:b')
                )
        );
    }
}
