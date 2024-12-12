<?php

namespace Modules\GeminiAiBot\Actions;

use Gemini\Laravel\Facades\Gemini;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Properties\ParseMode;

class AskGeminiAiAction
{

    public static function ask(Nutgram $bot)
    {
        $message = $bot->sendMessage('💭');

        $prompt = $bot->message()->getText();
        $stream = Gemini::geminiPro()
            ->streamGenerateContent($prompt);

        $result = '';
        foreach ($stream as $response) {
            $result .= $response->text();
            $bot->editMessageText(
                text: $result,
                message_id: $message->message_id,
                parse_mode: ParseMode::MARKDOWN_LEGACY
            );
        }
    }

}
