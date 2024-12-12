<?php

namespace Modules\GeminiAiBot\Telegram\Conversations;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Conversations\Conversation;

class GenerateTextConversation extends Conversation
{
    public function start(Nutgram $bot)
    {
        $bot->sendMessage('This is the first step!');
        $this->next('secondStep');
    }

    public function secondStep(Nutgram $bot)
    {
        $bot->sendMessage('Bye!');
        $this->end();
    }
}
